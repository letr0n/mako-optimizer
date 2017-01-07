<?php

/**
 * @copyright Yamada Taro
 */

namespace letron\optimizer\commands;

use letron\optimizer\commands\Command;

/**
 * Clear command.
 *
 * @author Yamada Taro
 */
class Clear extends Command
{
	/**
	 * Command information.
	 *
	 * @var array
	 */
	protected $commandInformation =
	[
		'description' => 'Clears the compiled classes.',
	];

	/**
	 * Clears the compiled classes.
	 *
	 * @access public
	 */
	public function execute()
	{
		$file = $this->getCompileFile();

		if(file_exists($file))
		{
			if(!is_writable($file))
			{
				$this->error(sprintf('<red>Unable to clear the compiled classes. Make sure that the file [ %s ] is writable.</red>', $file));

				return;
			}

			unlink($file);

			$this->write('<green>The compiled classes have been cleared.</green>');
		}
		else
		{
			$this->write('<green>Nothing to clear.</green>');
		}
	}
}
