<?php
require ('../vendor/autoload.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/**
 * Sessions
 * 
 * Ensure PHP sessions are started.
 */
session_start();

use artbyrab\phlash\Phlash;

Phlash::add("info", "This is Phlash!");
Phlash::add("success", "Your message was successful!");
Phlash::add("warning", "Be careful though, using Phlash can be addictive!");
Phlash::add("danger", "See it's hard to stop!");

?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Phlash</title>
    <meta name="description" content="Phlash">
    <meta name="author" content="artbyrab">

    <style>
        body {
            background:white;
            color:DarkSlateGrey;
            font-family:Tahoma, Geneva, sans-serif;
        }

        a:link, 
        a:hover,
        a:visited {
            color:SlateBlue;
            text-decoration:none;
        }

        a:hover {
            color:DarkSlateBlue;
            text-decoration:underline;
        }

        h1, h2, h3, h4, h5, h6 {
            color:RosyBrown;
        }

        .content {
            width:800px;
            margin:0px auto;
        }

        pre {
            background:LightGreen;
            padding:20px;
            font-family:monospace;
        }

        .alert {
            border: 1px solid transparent;
            border-radius: 1px;
            max-width:600px;
            margin:0px auto;
            margin-bottom:10px;
            display: grid;
            grid-template-columns: 1fr 50px;
        }

        .alert--success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert--danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert--info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }

        .alert--warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }

        .alert__message {
            padding:20px;
        }

        .alert__close {
            align-self: center;
            padding:20px;
            font-size: 21px;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: .2;
            color: inherit;
        }
    </style>
</head>
    <body>
        <div class="content">
            <h1>Phlash</h1>
            <h2>A PHP flash message library</h2>
            <p>This is an example of Phlash:</p>
            <?php if (Phlash::get() !== false) { ?>

                <div class="alerts">

                    <?php foreach (Phlash::get() as $flash) { ?>

                        <div id="alert--<?=$flash->id?>" class="alert alert--<?=$flash->type?>">

                            <div class="alert__message">
                                <?=$flash->message?>
                            </div>

                            <div class="alert__close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close" onclick="closeAlert(this)">×</a>
                            </div>    
                        </div>

                    <?php }; ?>

                    <?php Phlash::clear(); ?>

                </div>

            <?php }; ?>

            <script>
                function closeAlert(element) {
                    $id = document.getElementById(element.parentNode.parentNode.id);
                    $id.remove(); 
                };
            </script>

            <br />
            <br />
            <pre>session_start();

use artbyrab\phlash\Phlash;

Phlash::add("info", "This is Phlash!");
Phlash::add("success", "Your message was successful!");
Phlash::add("warning", "Be careful though, using Phlash can be addictive!");
Phlash::add("danger", "See it's hard to stop!");

foreach (Phlash::get() as $flash) { 

// @todo render your messages

};

<?php Phlash::clear(); ?></pre>
        </div>
    </body>
</html>