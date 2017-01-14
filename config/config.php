<?php

return
[
	/**
	 * Path to the compile path.
	 */
	'compile_path' => realpath(__DIR__ . '/../../../../app/storage'),

	/**
	 * Functions that shouldn't be prefixed.
	 */
	'ignored_functions' =>
	[

	],

	/**
	 * List of classes to compile.
	 */
	'classes' =>
	[

	],

	/**
	 * List of core classes to compile.
	 */
	'core_classes' =>
	[
		'mako\common\NamespacedFileLoaderTrait',
		'mako\common\FunctionParserTrait',
		'mako\common\ConfigurableTrait',
		'mako\common\ExtendableTrait',
		'mako\common\ConnectionManager',
		'mako\common\AdapterManager',

		'mako\utility\Arr',
		'mako\utility\Str',
		'mako\utility\Humanizer',
		'mako\utility\Collection',
		'mako\utility\ip\IP',
		'mako\utility\ip\IPv4',
		'mako\utility\ip\IPv6',

		'mako\application\Application',
		'mako\application\web\Application',

		'mako\syringe\Container',
		'mako\syringe\ClassInspector',
		'mako\syringe\ContainerAwareTrait',

		'mako\file\FileSystem',

		'mako\security\Key',
		'mako\security\Signer',

		'mako\onion\Onion',

		'mako\http\Request',
		'mako\http\Response',
		'mako\http\routing\Middleware',
		'mako\http\routing\Routes',
		'mako\http\routing\Route',
		'mako\http\routing\Router',
		'mako\http\routing\ControllerHelperTrait',
		'mako\http\routing\Controller',
		'mako\http\routing\Dispatcher',
		'mako\http\routing\URLBuilder',

		'mako\application\services\Service',
		'mako\application\services\SignerService',
		'mako\application\services\HTTPService',
		'mako\application\services\LoggerService',
		'mako\application\services\ViewFactoryService',
		'mako\application\services\web\ErrorHandlerService',
		'mako\application\services\DatabaseService',
		'mako\application\services\RedisService',
		'mako\application\services\SessionService',
		'mako\application\services\I18nService',
		'mako\application\services\HumanizerService',
		'mako\application\services\CacheService',
		'mako\application\services\CryptoService',
		'mako\application\services\ValidatorFactoryService',
		'mako\application\services\PaginationFactoryService',
		'mako\application\services\GatekeeperService',
		'mako\application\services\EventService',
		'mako\application\services\CommandBusService',

		'mako\error\ErrorHandler',

		'mako\database\query\Query',
		'mako\database\connections\Connection',
		'mako\database\ConnectionManager',
		'mako\database\query\helpers\HelperInterface',
		'mako\database\query\Query',
		'mako\database\query\Join',
		'mako\database\query\Subquery',
		'mako\database\query\compilers\Compiler',
		'mako\database\query\ResultSet',
		'mako\database\query\Raw',
		'mako\database\query\Result',
		'mako\database\query\ResultSet',
		'mako\database\midgard\ORM',
		'mako\database\midgard\Query',
		'mako\database\midgard\ResultSet',

		'mako\session\stores\StoreInterface',
		'mako\session\Session',

		'mako\redis\ConnectionManager',
		'mako\redis\Connection',
		'mako\redis\Redis',

		'mako\auth\Gatekeeper',
		'mako\auth\providers\UserProviderInterface',
		'mako\auth\providers\UserProvider',
		'mako\auth\providers\GroupProviderInterface',
		'mako\auth\providers\GroupProvider',
		'mako\auth\group\GroupInterface',
		'mako\auth\group\MemberInterface',
		'mako\auth\user\UserInterface',

		'mako\i18n\I18n',
		'mako\i18n\loaders\LoaderInterface',
		'mako\i18n\loaders\Loader',

		'mako\config\loaders\LoaderInterface',
		'mako\config\loaders\Loader',
		'mako\config\Config',

		'mako\cache\CacheManager',
		'mako\cache\Cache',
		'mako\cache\stores\StoreInterface',

		'mako\view\ViewFactory',
		'mako\view\View',
		'mako\view\renderers\EscaperTrait',
		'mako\view\renderers\RendererInterface',
		'mako\view\renderers\PHP',
		'mako\view\renderers\Template',

		'mako\event\Event',
		'mako\event\EventHandlerInterface',

		'mako\commander\CommandBusInterface',
		'mako\commander\CommandBus',
		'mako\commander\CommandHandlerInterface',
		'mako\commander\CommandInterface',
		'mako\commander\SelfHandlingCommandInterface',

		'mako\Mako',
	],
];
