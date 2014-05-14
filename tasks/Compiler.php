<?php

namespace optimizer\tasks;

use \PhpParser\Lexer;
use \PhpParser\Parser;
use \PhpParser\PrettyPrinter\Standard as Printer;

/**
 * Task that compiles the specified class files into one.
 * This can help speed up the application by reducing
 * the number of files it has to load from disk.
 */

class Compiler extends \mako\reactor\Task
{
	use \mako\syringe\ContainerAwareTrait;

	/**
	 * Task information.
	 * 
	 * @var array
	 */

	protected static $taskInfo = 
	[
		'compile' => 
		[
			'description' => 'Compiles classes into a single file.',
			'options'     => 
			[
				'strip-comments' => 'Optionally strips comments from the compiled class file.',
			],
		],
		'clear'  =>
		[
			'description' => 'Removes the file containing the compiled classes.',
		],
	];

	/**
	 * Returns the compilation path.
	 *
	 * @access  protected
	 * @return  string
	 */

	protected function getCompilePath()
	{
		return $this->app->getApplicationPath() . '/storage';
	}

	/**
	 * Returns the path to the compiled classes.
	 *
	 * @access  protected
	 * @return  string
	 */

	public function getCompileFile()
	{
		return $this->getCompilePath() . '/compiled.php';
	}

	/**
	 * Compiles a class.
	 *
	 * @access  protected
	 * @param   string     $class  Class path
	 * @return  string
	 */

	protected function compileClass($class, $stripComments)
	{
		$contents = $stripComments ? php_strip_whitespace($class) : file_get_contents($class);

		$parsed = (new Parser(new Lexer))->parse($contents);

		$printed =  trim((new Printer)->prettyPrint($parsed));

		if(preg_match('/namespace([^;]++);/', $printed, $matches) !== 0)
		{
			$printed = 'namespace ' . $matches[1] . ' {' . str_replace($matches[0], '', $printed) . '}';
		}

		return $printed;
	}

	/**
	 * Compiles the classes.
	 *
	 * @access  protected
	 * @param   string     $classes        Array of classes we want to compile
	 * @param   string     $vendorPath     Path to the vendor directory
	 * @param   boolean    $stripComments  TRUE to strip comments and FALSE to leave them
	 * @return  void
	 */

	protected function compileClasses($classes, $vendorPath, $stripComments)
	{
		$progress = $this->output->progress(count($classes));

		$fileResource = fopen($this->getCompileFile(), 'w+');

		fwrite($fileResource, '<?php' . PHP_EOL);

		foreach($classes as $class)
		{
			fwrite($fileResource, $this->compileClass(str_replace(':vendor:', $vendorPath, $class), $stripComments));

			$progress->advance();
		}

		fclose($fileResource);

		$progress->finish();
	}

	/**
	 * Compiles the classes.
	 *
	 * @access  public
	 * @return  void
	 */

	public function compile()
	{
		if(!is_writable($this->getCompilePath()) || (file_exists($this->getCompileFile()) && !is_writable($this->getCompileFile())))
		{
			return $this->output->stderr()->writeln(sprintf('Unable to compile classes. Make sure that the compile directory [ %s ] is writable.', $this->getCompilePath()));
		}

		$vendorPath = $this->config->get('optimizer::config.vendor_path');

		$classes = $this->config->get('optimizer::config.classes');
		
		$stripComments = $this->input->param('strip-comments', false);

		$this->compileClasses($classes, $vendorPath, $stripComments);
	}

	/**
	 * Removes the compiled class file.
	 * 
	 * @access  public
	 * @return  void
	 */

	public function clear()
	{
		if(file_exists($this->getCompileFile()))
		{
			if(!is_writable($this->getCompileFile()))
			{
				return $this->output->stderr()->writeln(sprintf('<red>Unable to clear the compiled classes. Make sure that the file [ %s ] is writable.</red>', $this->getCompileFile()));
			}

			unlink($this->getCompileFile());

			$this->output->writeln('<green>The compiled classes have been cleared.</green>');
		}
		else
		{
			$this->output->writeln('<green>Nothing to clear.</green>');
		}
	}
}
