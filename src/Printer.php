<?php

/**
 * @copyright Yamada Taro
 */

namespace letron\optimizer;

use PhpParser\Node\Expr;
use PhpParser\PrettyPrinter\Standard;

/**
 * Printer.
 *
 * @author Yamada Taro
 */
class Printer extends Standard
{
	/**
	 * Core functions.
	 *
	 * @var array
	 */
	protected $coreFunctions = [];

	/**
	 * {@inheritdoc}
	 */
	public function __construct(array $options = [])
	{
		parent::__construct($options);

		// Get core functions

		$this->coreFunctions = array_flip(get_defined_functions()['internal']);

		if(!empty($options['ignored_functions']))
		{
			foreach($options['ignored_functions'] as $function)
			{
				unset($this->coreFunctions[$function]);
			}
		}
	}

	/**
	 * Returns true if the function is a core function and false if not.
	 *
	 * @access public
	 * @param  string $function Function name
	 * @return boool
	 */
	public function isCoreFunction(string $function): bool
	{
		return isset($this->coreFunctions[$function]);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function pExpr_FuncCall(Expr\FuncCall $node)
	{
		$function = $this->pCallLhs($node->name);

		if($this->isCoreFunction($function))
		{
			$function = '\\' . $function;
		}

		return $function . '(' . $this->pCommaSeparated($node->args) . ')';
	}
}