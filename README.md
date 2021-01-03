# Phlash

![Image](files/graphics/phlash-logo-small.png?raw=true)

Phlash is a very simple PHP flash messages library. Phlash does not define how your flash messages look or whether you use javascript to close them or not. Instead, Phlash just provides the very raw tools to quickly add and get flash messages.

## Requirements

* PHP 5.6+

## Features

* Flash messages
    * Add one or more flash messages with a type
        * Define your own types like warning, info, danger or anything you desire
    * Get 
        * Get your flash messages to show in a view
        * Render any way you like including choosing your own div layouts and naming conventions
    * Clear
        * Clear the flash messages after they have been shown

## Installation

The reccomended way to install is via Composer.

Ensure your minimum-stability is set to dev:

```shell
$ composer require artbyrab/phlash
```

or add it to your composer.json file:

```json
"artbyrab/phlash": "master@dev"
```

## Usage

Ensure your view or entry script has php sessions activated:

```php
session_start();
```

Add one or more flash messages in your controller action or file:

```php
use artbyrab\phlash\Phlash;

Phlash::add("info", "This is Phlash!");
Phlash::add("success", "Your message was successful!");
Phlash::add("warning", "Be careful though, using Phlash can be addictive!");
Phlash::add("danger", "See it's hard to stop!");
```

Add a way to render the flash messages in your view/layout or file. Please note the below is just an example of how you can render your flash messages, you don't need to use the below format:

```html
<?php if (Phlash::get() !== false) { ?>

    <div class="alerts">

        <?php foreach (Phlash::get() as $flash) { ?>

            <div class="alert alert--<?=$flash->type?>">

                <div class="alert__message">
                    <?=$flash->message?>
                </div>

                <div class="alert__close">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                </div>    
            </div>

        <?php }; ?>

        <?php Phlash::clear(); ?>

    </div>

<?php }; ?>
```

For more information on using Phlash have a read of the documentation and guides:

## Resources

* [Code Checks](documents/code-checks.md)
* [Dismissable Messages](documents/dismissable-messages.md)
* [Example](documents/example.md)
* [Flash message types](documents/flash-message-types.md)
* [Running Tests](documents/running-tests.md)
* [Starting a PHP session](documents/starting-a-php-session.md)