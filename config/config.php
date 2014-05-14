<?php

return 
[
	/**
	 * Path to the vendor dir
	 */
	 
	'vendor_path' => realpath(__DIR__ . '/../../../../vendor'),

	/**
	 * List of classes to compile.
	 */

	'classes' => 
	[
		// Core classes

		':vendor:/mako/framework/src/mako/config/Config.php',
		':vendor:/mako/framework/src/mako/utility/Arr.php',
		':vendor:/mako/framework/src/mako/core/Application.php',
		':vendor:/mako/framework/src/mako/core/WebApplication.php',
		':vendor:/mako/framework/src/mako/core/services/Service.php',
		':vendor:/mako/framework/src/mako/error/ErrorHandler.php',
		':vendor:/mako/framework/src/mako/security/Signer.php',
		':vendor:/mako/framework/src/mako/http/routing/Routes.php',
		':vendor:/mako/framework/src/mako/http/routing/Route.php',
		':vendor:/mako/framework/src/mako/http/routing/Router.php',
		':vendor:/mako/framework/src/mako/http/routing/Dispatcher.php',
		':vendor:/mako/framework/src/mako/http/routing/Controller.php',
		':vendor:/mako/framework/src/mako/view/renderers/RendererInterface.php',
		':vendor:/mako/framework/src/mako/view/renderers/CacheableInterface.php',
		':vendor:/mako/framework/src/mako/view/renderers/Renderer.php',
		':vendor:/mako/framework/src/mako/view/renderers/Template.php',
		':vendor:/mako/framework/src/mako/view/ViewFactory.php',
		':vendor:/mako/framework/src/mako/http/Request.php',
		':vendor:/mako/framework/src/mako/http/Response.php',
		':vendor:/mako/framework/src/mako/syringe/Container.php',

		// Services

		':vendor:/mako/framework/src/mako/core/services/ErrorHandlerService.php',
		':vendor:/mako/framework/src/mako/core/services/RequestService.php',
		':vendor:/mako/framework/src/mako/core/services/ResponseService.php',
		':vendor:/mako/framework/src/mako/core/services/SignerService.php',
		':vendor:/mako/framework/src/mako/core/services/RouteService.php',
		':vendor:/mako/framework/src/mako/core/services/URLBuilderService.php',
		':vendor:/mako/framework/src/mako/core/services/LoggerService.php',
		':vendor:/mako/framework/src/mako/core/services/ViewFactoryService.php',
		':vendor:/mako/framework/src/mako/core/services/SessionService.php',
		':vendor:/mako/framework/src/mako/core/services/DatabaseService.php',
		':vendor:/mako/framework/src/mako/core/services/RedisService.php',
		':vendor:/mako/framework/src/mako/core/services/I18nService.php',
		':vendor:/mako/framework/src/mako/core/services/HumanizerService.php',
		':vendor:/mako/framework/src/mako/core/services/CacheService.php',
		':vendor:/mako/framework/src/mako/core/services/CryptoService.php',
		':vendor:/mako/framework/src/mako/core/services/ValidatorFactoryService.php',
		':vendor:/mako/framework/src/mako/core/services/PaginationFactoryService.php',
		':vendor:/mako/framework/src/mako/core/services/GatekeeperService.php',
	],
];
