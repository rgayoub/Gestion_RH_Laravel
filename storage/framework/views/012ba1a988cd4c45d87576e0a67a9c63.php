<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title ?? 'HRMS'); ?></title>
    <link rel="preload" href="<?php echo e(asset('css/bootstrap.css')); ?>" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>"></noscript>

</head>
<body>
    <?php echo $__env->make('components.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/components/header.blade.php ENDPATH**/ ?>