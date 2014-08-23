<?php

return 
[
	/**
	 * Path to the compile path.
	 */
	 
	'compile_path' => realpath(__DIR__ . '/../../../storage'),

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
		'\mako\file\FileSystem',
		'\mako\config\Config',
		'\mako\utility\Arr',
		'\mako\application\Application',
		'\mako\application\Web',
		'\mako\application\services\Service',
		'\mako\error\ErrorHandler',
		'\mako\security\Comparer',
		'\mako\security\Signer',
		'\mako\http\routing\Routes',
		'\mako\http\routing\Route',
		'\mako\http\routing\Router',
		'\mako\http\routing\Dispatcher',
		'\mako\http\routing\Controller',
		'\mako\view\renderers\RendererInterface',
		'\mako\view\renderers\CacheableInterface',
		'\mako\view\renderers\Renderer',
		'\mako\view\renderers\Template',
		'\mako\view\ViewFactory',
		'\mako\http\Request',
		'\mako\http\Response',
		'\mako\syringe\Container',
		'\mako\application\services\ErrorHandlerService',
		'\mako\application\services\RequestService',
		'\mako\application\services\ResponseService',
		'\mako\application\services\SignerService',
		'\mako\application\services\RouteService',
		'\mako\application\services\URLBuilderService',
		'\mako\application\services\LoggerService',
		'\mako\application\services\ViewFactoryService',
		'\mako\application\services\SessionService',
		'\mako\application\services\DatabaseService',
		'\mako\application\services\RedisService',
		'\mako\application\services\I18nService',
		'\mako\application\services\HumanizerService',
		'\mako\application\services\CacheService',
		'\mako\application\services\CryptoService',
		'\mako\application\services\ValidatorFactoryService',
		'\mako\application\services\PaginationFactoryService',
		'\mako\application\services\GatekeeperService',
	],
];