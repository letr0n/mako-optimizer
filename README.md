# Mako Optimizer

Command line task for the Mako framework that compiles classes into a single file to reduce the ammount of file includes required to process a request.

	php reactor optimizer::compiler.compile

	php reactor optimizer::compiler.compiler --strip-comments

You'll need to add the following lines to the ```index.php``` file (before the part where it requires the init file and runs the application).

	if(file_exists(MAKO_APPLICATION_PATH . '/storage/compiled.php'))
	{
		include MAKO_APPLICATION_PATH . '/storage/compiled.php';
	}
