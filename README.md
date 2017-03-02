ServicesBundle
=============

This bundle implements a service to call rest api. Features include:
 - Call a rest API and receive a json decoded to array
 - Call a rest API and receive a json not decoded
 - Automatically you can pass as parameter the http verb and json, it automatically will make the request

Note
----

At this moment this bundle is only in alpha version

Documentation
-------------

I'm doing it

Installation
------------

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require <package-name> "~1"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new <vendor>\<bundle-name>\<bundle-long-name>(),
        );

        // ...
    }

    // ...
}
```

License
-------

This bundle is under the MIT license.