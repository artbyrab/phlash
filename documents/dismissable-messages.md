# Dismissable messages

Phlash is un-opionated by default meaning it provides you with no default behaviour to dismiss a flash message. You can of course implement this in any way you see fit. Below are some examples of how you can do it:

## Javascript

```html
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
```



## Other methods

You can use any method you like to implement removing flash messages like Jquery or using something like Alpine.js.