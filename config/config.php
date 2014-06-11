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
		
		':vendor:/mako/framework/src/mako/file/FileSystem.php',
		':vendor:/mako/framework/src/mako/config/Config.php',
		':vendor:/mako/framework/src/mako/utility/Arr.php',
		':vendor:/mako/framework/src/mako/application/Application.php',
		':vendor:/mako/framework/src/mako/application/Web.php',
		':vendor:/mako/framework/src/mako/application/services/Service.php',
		':vendor:/mako/framework/src/mako/error/ErrorHandler.php',
		':vendor:/mako/framework/src/mako/security/Comparer.php',
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

		':vendor:/mako/framework/src/mako/application/services/ErrorHandlerService.php',
		':vendor:/mako/framework/src/mako/application/services/RequestService.php',
		':vendor:/mako/framework/src/mako/application/services/ResponseService.php',
		':vendor:/mako/framework/src/mako/application/services/SignerService.php',
		':vendor:/mako/framework/src/mako/application/services/RouteService.php',
		':vendor:/mako/framework/src/mako/application/services/URLBuilderService.php',
		':vendor:/mako/framework/src/mako/application/services/LoggerService.php',
		':vendor:/mako/framework/src/mako/application/services/ViewFactoryService.php',
		':vendor:/mako/framework/src/mako/application/services/SessionService.php',
		':vendor:/mako/framework/src/mako/application/services/DatabaseService.php',
		':vendor:/mako/framework/src/mako/application/services/RedisService.php',
		':vendor:/mako/framework/src/mako/application/services/I18nService.php',
		':vendor:/mako/framework/src/mako/application/services/HumanizerService.php',
		':vendor:/mako/framework/src/mako/application/services/CacheService.php',
		':vendor:/mako/framework/src/mako/application/services/CryptoService.php',
		':vendor:/mako/framework/src/mako/application/services/ValidatorFactoryService.php',
		':vendor:/mako/framework/src/mako/application/services/PaginationFactoryService.php',
		':vendor:/mako/framework/src/mako/application/services/GatekeeperService.php',
	],
];
