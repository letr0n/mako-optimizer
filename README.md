# Mako Optimizer

Command line task for the Mako framework that compiles classes into a single file to reduce the ammount of file includes required to process a request.

### How do I use it?

You'll need to add the following lines to the ```index.php``` file (before the part where it requires the init file and runs the application).

	if(file_exists(MAKO_APPLICATION_PATH . '/storage/compiled.php'))
	{
		include MAKO_APPLICATION_PATH . '/storage/compiled.php';
	}

You can then execute the ```compile``` action of the optimizer compiler.

	php reactor optimizer::compiler.compile

	php reactor optimizer::compiler.compiler --strip-comments
	
If you want to clear the compiled files then you can do so by executing the ```clear``` action of the optimizer compiler.

	php reactor optimizer::compiler.clear
	
### How much faster does it get?

That depends on a lot of things so the easiest way to find out is to try for yourself.

### Known issues

* The ```compile``` action might output the following error "Undefined variable: undefinedVariable" ... just ingore it.
