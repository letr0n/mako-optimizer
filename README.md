# Mako Optimizer

Command line task for the Mako framework that compiles classes into a single file to reduce the ammount of file includes required to process a request.

### How do I use it?

First you'll have to register the package with your Mako application. This is done by adding ```letron\optimizer\OptimizerPackage``` to the list of packages in your ```app/config/application.php``` file.

Then you'll need to add the following lines to the ```index.php``` file (right after the part where it requires the init file).

	if(file_exists(MAKO_APPLICATION_PATH . '/storage/compiled.php'))
	{
		include MAKO_APPLICATION_PATH . '/storage/compiled.php';
	}

You can then execute the ```compile``` action of the optimizer compiler.

	php reactor optimizer.compile

	php reactor optimizer.compiler --strip-comments

If you want to clear the compiled files then you can do so by executing the ```clear``` action of the optimizer compiler.

	php reactor optimizer.clear

### How much faster does it get?

That depends on a lot of factors so the easiest way to find out is to try for yourself.
