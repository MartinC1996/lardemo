<?php /* C:\xampp\htdocs\test_laravel\resources\views/projects/index.blade.php */ ?>
<html>


<head>

    <title></title>
</head>

<body>

<h1>Projects</h1>

    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($project->title); ?></li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</body>
</html>