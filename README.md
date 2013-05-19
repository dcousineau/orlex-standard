Orlex Standard Distribution
===

The Orlex Standard Distribution is a project installable through [Composer](http://getcomposer.org) that provides a skeleton
application utilizing Orlex as well as projects like [Twig](http://twig.sensiolabs.org/) and [Symfony Forms](http://symfony.com/doc/master/book/forms.html).

Installation
---

The easiest installation is via composer. After [installing composer](http://getcomposer.org/doc/00-intro.md#installation-nix) simply run
the following in your command line:

    php composer.phar create-project dcousineau/orlex-standard path/to/install

Composer will download a copy of this project into the `path/to/install` and setup all of its dependencies. Aftewards you
will be ready to slam out code for your project!

Details
---

Orlex Standard provides sample code found in the `src/` directory. To remove all traces of sample code, first completely
remove the `src/App/` directory, then update `config/web.php` line 11 to point to a proper controller directory.

Environment
---

The standard distribution reads an environment variable to determin debug mode. If you're using Apache, adding a
[SetEnv](http://httpd.apache.org/docs/2.2/mod/mod_env.html#setenv) directive to either your vhost or `.htaccess` (not recommended)
will allow you to control the environment setting. For example:

    SetEnv ENVIRONMENT dev

In your vhost definition will ensure Silex's debug mode is enabled. You can also develop your application to respect environment
by referencing `$app['environment']`.
