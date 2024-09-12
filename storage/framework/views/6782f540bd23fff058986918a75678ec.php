<?php if($employee->vacations->isNotEmpty()): ?>
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Vacations</h4>
        </div>
        <ul class="list-group list-group-flush">
            <?php $__currentLoopData = $employee->vacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $startDate = \Carbon\Carbon::parse($vacation->start_date);
                    $endDate = \Carbon\Carbon::parse($vacation->end_date);
                    $today = \Carbon\Carbon::today();
                    $status = $today->isBetween($startDate, $endDate) ? 'Active' :
                              ($today->lt($startDate) ? 'Upcoming' : 'Past');
                    $badgeClass = $status === 'Active' ? 'badge bg-success' :
                                  ($status === 'Upcoming' ? 'badge bg-warning text-dark' : 'badge bg-secondary');
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <span class="fw-bold">Period:</span>
                        <?php echo e($startDate->format('M d, Y')); ?> - <?php echo e($endDate->format('M d, Y')); ?>

                    </div>
                    <span class="<?php echo e($badgeClass); ?>"><?php echo e($status); ?></span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php else: ?>
    <div class="alert alert-info mt-4" role="alert">
        No vacations recorded.
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/private/employee/components/vacations.blade.php ENDPATH**/ ?>