<?php

/**
 * @copyright  Yamada Taro
 */

namespace letron\optimizer;

use mako\application\Package;

/**
 * Optimizer package.
 *
 * @author  Yamada Taro
 */

class OptimizerPackage extends Package
{
	/**
	 * Package name.
	 *
	 * @var string
	 */

	protected $packageName = 'letron/optimizer';

	/**
	 * File namespace.
	 *
	 * @var string
	 */

	protected $fileNamespace = 'optimizer';

	/**
	 * Commands.
	 *
	 * @var array
	 */

	protected $commands =
	[
		'optimizer.clear'   => 'letron\optimizer\commands\Clear',
		'optimizer.compile' => 'letron\optimizer\commands\Compile',
	];
}