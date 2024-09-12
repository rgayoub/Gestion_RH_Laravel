
<?php if($employee->schedule_id == null): ?>
    <div class="alert alert-warning" role="alert">
        <strong>Note:</strong> This employee does not have a schedule assigned. Please assign one from the list below.
    </div>

    <ol class="list-group list-group-numbered">
        <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        <a href="<?php echo e(route('schedules.show', ['schedule' => $schedule->id])); ?>"><?php echo e($schedule->name); ?></a>
                    </div>
                    <?php echo e($schedule->days_of_week); ?> <br>
                    From: <?php echo e($schedule->start_time); ?> To: <?php echo e($schedule->end_time); ?>

                </div>
                <form action="<?php echo e(route('employees.assignSchedule', ['id' => $employee->id])); ?>" method="post"
                    class="d-flex align-items-center">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($schedule->id); ?>" name="id">
                    <button type="submit" class="btn btn-success btn-sm me-2">Assign</button>
                </form>
                <span class="badge bg-primary rounded-pill"><?php echo e($schedule->employees->count()); ?></span>
                
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
<?php else: ?>
    <style>
        .week-calendar {
            display: flex;
            justify-content: start;
            list-style: none;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        .week-calendar li {
            flex: 1;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            text-align: center;
            margin: 2px;
            font-size: 14px;
        }

        .week-calendar .active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            /* Bootstrap's default danger color */
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            /* Slightly darker for hover effect */
            border-color: #bd2130;
        }

        .card-title {
            color: #007bff;
            /* Theme color for emphasis */
        }
    </style>

    <div class="card">
        <div class="card-header">
            Schedule Information
        </div>
        <div class="card-body">
            <h5 class="card-title">Assigned to: <strong><?php echo e($employee->schedule->name); ?></strong></h5>
            <p class="card-text">
                <strong>Days of Week:</strong> <?php echo e($employee->schedule->days_of_week); ?>


                <br>
                <strong>Time:</strong> From <?php echo e($employee->schedule->start_time); ?> to
                <?php echo e($employee->schedule->end_time); ?>

            </p>
            <form action="<?php echo e(route('employees.unassignSchedule', ['id' => $employee->id])); ?>" method="post"
                class="mt-3">
                <?php echo method_field('put'); ?>
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger">Unassign Schedule</button>
            </form>
        </div>
        <ul class="week-calendar">
            <?php
                $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                $scheduleDays = explode(',', $employee->schedule->days_of_week);
            ?>
            <?php $__currentLoopData = $daysOfWeek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e(in_array($day, $scheduleDays) ? 'active' : ''); ?>"><?php echo e($day); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/private/employee/components/schedule.blade.php ENDPATH**/ ?>