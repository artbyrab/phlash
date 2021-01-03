# Example

Below is an example of using Phlash in your app.

```html
<?php
session_start();

use artbyrab\phlash\Phlash;

Phlash::add("info", "This is Phlash!");
Phlash::add("success", "Your message was successful!");
Phlash::add("warning", "Be careful though, using Phlash can be addictive!");
Phlash::add("danger", "See it's hard to stop!");

>

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

Please note if you want the close functionality to work you will need to implement some solution using either Javascript, jquery or the frontend library of your choice like Alpine.js for example.