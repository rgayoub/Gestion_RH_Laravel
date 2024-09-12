<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .card-custom {
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .card-custom:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }

    .card-header-custom {
        background-color: #007bff;
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        font-size: 20px;
    }

    .btn-custom {
        background-color: #28a745;
        color: white;
        border: none;
    }

    .btn-custom:hover {
        background-color: #218838;
    }

    .btn-danger-custom {
        background-color: #dc3545;
        color: white;
        border: none;
    }

    .btn-danger-custom:hover {
        background-color: #c82333;
    }
</style>



<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Schedules</span>
    </div>

    <div class="mycontent">

        <div class="container-sm mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="<?php echo e(route('schedules.create')); ?>" class="btn btn-custom">Add Schedule</a>
                        <!-- Show the Statistics button only if there are schedules -->
                        <?php if($schedules->isNotEmpty()): ?>
                            <a href="<?php echo e(route('schedule.statistics')); ?>" class="btn btn-primary">Statistics</a>
                        <?php endif; ?>
                    </div>
                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="card card-custom">
                                <div class="card-header card-header-custom">
                                    <?php echo e($schedule->name); ?>

                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Schedule Details</h5>
                                    <p class="card-text">Start Time: <?php echo e($schedule->start_time); ?></p>
                                    <p class="card-text">End Time: <?php echo e($schedule->end_time); ?></p>
                                    <p class="alert alert-light" role="alert">Days:
                                        <?php echo e(str_replace(',', ', ', $schedule->days_of_week)); ?></p>
                                    <p class="card-text">Days Count: <?php echo e(count(explode(',', $schedule->days_of_week))); ?>

                                    </p>
                                    <a href="<?php echo e(route('schedules.edit', $schedule->id)); ?>"
                                        class="btn btn-custom">Edit</a>
                                    <a href="<?php echo e(route('schedules.show', $schedule->id)); ?>" class="btn btn-info">Show</a>

                                    <form action="<?php echo e(route('schedules.destroy', $schedule->id)); ?>" method="POST"
                                        style="display: inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger-custom"
                                            onclick="return confirm('Are you sure you want to delete this schedule?')">Delete</button>
                                    </form>
                                    <?php if(!$schedule->employees->isNotEmpty()): ?>
                                        <div class="alert alert-warning mt-2" role="alert">
                                            No employees assigned to this schedule.
                                        </div>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('schedule.assigned', ['id' => $schedule->id])); ?>"
                                            class="btn btn-primary position-relative">
                                            Assigned
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                <?php echo e($schedule->employees->count()); ?>

                                                <span class="visually-hidden">assigned employees</span>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

    </div>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

</section>

</body>

</html>
<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/schedules/index.blade.php ENDPATH**/ ?>