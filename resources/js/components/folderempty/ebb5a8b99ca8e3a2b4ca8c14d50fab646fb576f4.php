<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Theme::getMetaTitle(); ?> :: <?php echo e(__('app.name')); ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <style>
            html {
                display: table;
                width: 100%;
                height: 100%;
            }
        </style>
        <?php echo Theme::asset()->styles(); ?>

        <?php echo Theme::asset()->scripts(); ?>


    </head>
    <body class="auth">
    <?php echo Theme::content(); ?>


    <?php echo Theme::asset()->container('footer')->scripts(); ?>

    </body>
</html>
<?php /**PATH D:\xampp\htdocs\website\public\themes/admin/layouts/auth.blade.php ENDPATH**/ ?>