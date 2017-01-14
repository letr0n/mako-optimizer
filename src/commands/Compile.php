<?php

/**
 * @copyright Yamada Taro
 */

namespace letron\optimizer\commands;

use ReflectionClass;

use letron\optimizer\commands\Command;
use letron\optimizer\Printer;

use PhpParser\ParserFactory;

/**
 * Compile command.
 *
 * @author Yamada Taro
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
			'keep-comments' =>
			[
				'optional'    => true,
				'description' => 'Keep comments from being removed.',
			],
		]
	];

	/**
	 * Returns array of classes to compile.
	 *
	 * @access protected
	 * @return array
	 */
	public function getClasses(): array
	{
		return array_unique(array_merge($this->config->get('optimizer::config.core_classes'), $this->config->get('optimizer::config.classes')));
	}

	/**
	 * Compiles a class.
	 *
	 * @access protected
	 * @param  string $class        Class path
	 * @param  bool   $keepComments True to keep comments and false to remove them
	 * @param  array  $options      Printer options
	 * @return string
	 */
	protected function compileClass(string $class, bool $keepComments, array $options): string
	{
		$contents = $keepComments ? file_get_contents($class) : php_strip_whitespace($class);

		$parser = (new ParserFactory)->create(ParserFactory::ONLY_PHP7);

		$parsed = $parser->parse($contents);

		$printed =  trim((new Printer($options))->prettyPrint($parsed));

		if(preg_match('/namespace([^;]++);/', $printed, $matches) !== 0)
		{
			$printed = 'namespace ' . $matches[1] . ' {' . str_replace($matches[0], '', $printed) . '}';
		}

		return $printed;
	}

	/**
	 * Compiles the classes.
	 *
	 * @access protected
	 * @param  array $classes      Array of classes we want to compile
	 * @param  bool  $keepComments True to keep comments and false to remove them
	 */
	protected function compileClasses(array $classes, bool $keepComments)
	{
		$progressbar = $this->progressBar(count($classes));

		$fileResource = fopen($this->getCompileFile(), 'w+');

		fwrite($fileResource, '<?php' . PHP_EOL);

		$ignoredFunction = $this->config->get('optimizer::config.ignored_functions.*', []);

		foreach($classes as $class)
		{
			$classPath = (new ReflectionClass($class))->getFileName();

			if($classPath !== false)
			{
				$options = 
				[
					'ignored_functions' => $ignoredFunction + $this->config->get('optimizer::config.ignored_functions.' . $class, []),
				];

				fwrite($fileResource, $this->compileClass($classPath, $keepComments, $options));
			}

			$progressbar->advance();
		}

		fclose($fileResource);
	}

	/**
	 * Compiles classes into a single file.
	 *
	 * @access public
	 * @param bool $keep_comments True to keep comments and false to remove them
	 */
	public function execute(bool $keep_comments = false)
	{
		if(!is_writable($this->getCompilePath()) || (file_exists($this->getCompileFile()) && !is_writable($this->getCompileFile())))
		{
			$this->error(sprintf('Unable to compile classes. Make sure that the storage directory [ %s ] is writable.', $this->getCompilePath()));

			return;
		}

		$this->compileClasses($this->getClasses(), $keep_comments);
	}
}
