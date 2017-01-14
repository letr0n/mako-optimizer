<?php

/**
 * @copyright Yamada Taro
 */

namespace letron\optimizer\commands;

use mako\reactor\Command as BaseCommand;

/**
 * Command.
 *
 * @author Yamada Taro
 */
abstract class Command extends BaseCommand
{
	/**
	 * {@inheritdoc}
	 */
	protected $isStrict = true;

	/**
	 * Returns the compilation path.
	 *
	 * @access protected
	 * @return string
	 */
	protected function getCompilePath(): string
	{
		return $this->config->get('optimizer::config.compile_path');
	}

	/**
	 * Returns the path to the compiled classes.
	 *
	 * @access protected
	 * @return string
	 */
	public function getCompileFile(): string
	{
		return $this->getCompilePath() . '/compiled.php';
	}
}
