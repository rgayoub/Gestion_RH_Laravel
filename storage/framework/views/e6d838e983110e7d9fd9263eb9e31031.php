<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><?php echo e($schedule->name); ?> staff</span>
    </div>
    <div class="mycontent">

        <div class="container-sm mt-5">
            <h2><?php echo e($schedule->name); ?> - Assigned Employees</h2>
            <?php echo e($employees->links('vendor.pagination.simple-bootstrap-4')); ?>

            <?php if($employees->isEmpty()): ?>
                <p>No employees are currently assigned to this schedule.</p>
            <?php else: ?>
                <div class="list-group">
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($employee->training == 0): ?>
                            <a href="<?php echo e(route('employee.show', $employee->id)); ?>"
                                class="list-group-item list-group-item-action">
                                <?php echo e($employee->first_name); ?> , <?php echo e($employee->last_name); ?> -
                                <span class="badge text-bg-primary">Employee</span>
                                <span class="text-primary float-end">More details</span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('trainee.show', $employee->id)); ?>"
                                class="list-group-item list-group-item-action">
                                <?php echo e($employee->first_name); ?> , <?php echo e($employee->last_name); ?> -
                                <span class="badge text-bg-info">Trainee</span>

                                <span class="text-primary float-end">More details</span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Pagination -->
                <div class="mt-4">
        <?php echo e($employees->links('vendor.pagination.bootstrap-5')); ?>

                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/schedules/assignedEmployees.blade.php ENDPATH**/ ?>