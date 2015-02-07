<?php

/**
 * @copyright  Yamada Taro
 */

namespace letron\optimizer\commands;

use \ReflectionClass;

use letron\optimizer\commands\Command;

use \PhpParser\Lexer;
use \PhpParser\Parser;
use \PhpParser\PrettyPrinter\Standard as Printer;

/**
 * Compile command.
 *
 * @author  Yamada Taro
 */

class Compile extends Command
{
	/**
	 * Command information.
	 *
	 * @var array
	 */

	protected $commandInformation =
	[
		'description' => 'Compiles classes into a single file.',
		'options'     =>
		[
			'strip-comments' =>
			[
				'optional'    => true,
				'description' => 'Optionally strips comments from the compiled class file.'
			],
		]
	];

	/**
	 * Returns array of classes to compile.
	 *
	 * @access  protected
	 * @return  array
	 */

	public function getClasses()
	{
		return array_unique(array_merge($this->config->get('optimizer::config.core_classes'), $this->config->get('optimizer::config.classes')));
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
	 * @param   boolean    $stripComments  TRUE to strip comments and FALSE to leave them
	 * @return  void
	 */

	protected function compileClasses($classes, $stripComments)
	{
		$progressbar = $this->progressBar(count($classes));

		$fileResource = fopen($this->getCompileFile(), 'w+');

		fwrite($fileResource, '<?php' . PHP_EOL);

		foreach($classes as $class)
		{
			$classPath = (new ReflectionClass($class))->getFileName();

			if($classPath !== false)
			{
				fwrite($fileResource, $this->compileClass($classPath, $stripComments));
			}

			$progressbar->advance();
		}

		fclose($fileResource);
	}

	/**
	 * Compiles classes into a single file.
	 *
	 * @access  public
	 * @param   boolean  $strip_comments  TRUE to strip comments and FALSE to leave them
	 */

	public function execute($strip_comments = false)
	{
		if(!is_writable($this->getCompilePath()) || (file_exists($this->getCompileFile()) && !is_writable($this->getCompileFile())))
		{
			$this->error(sprintf('Unable to compile classes. Make sure that the compile directory [ %s ] is writable.', $this->getCompilePath()));

			return;
		}

		$this->compileClasses($this->getClasses(), $strip_comments);
	}
}