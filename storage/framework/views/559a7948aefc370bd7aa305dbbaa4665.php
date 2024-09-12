<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Vacations/Take-off</span>
    </div>
    <div class="mycontent">
        <div class="container-sm mt-5">
            <div class="d-flex align-items-center">
                <a href="<?php echo e(route('vacations.create')); ?>" class="btn btn-success mb-3 me-2">Add Vacation</a>
                <a href="<?php echo e(route('vacations.statistics')); ?>" class="btn btn-success mb-3 me-2">show stats</a>
                <div class="dropdown mb-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="vacationFilterDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Filter Vacations
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="vacationFilterDropdown">
                        <li><a class="dropdown-item <?php echo e(request('upcoming') == 'true' ? 'active' : ''); ?>"
                                href="<?php echo e(route('vacations.index', ['upcoming' => 'true'])); ?>">Show Upcoming
                                Vacations</a></li>
                        <li><a class="dropdown-item <?php echo e(request('ongoing') == 'true' ? 'active' : ''); ?>"
                                href="<?php echo e(route('vacations.index', ['ongoing' => 'true'])); ?>">Show Ongoing Vacations</a>
                        </li>
                        <li><a class="dropdown-item <?php echo e(request('past') == 'true' ? 'active' : ''); ?>"
                                href="<?php echo e(route('vacations.index', ['past' => 'true'])); ?>">Show Past Vacations</a></li>
                        <li><a class="dropdown-item <?php echo e(request('all') == 'true' ? 'active' : ''); ?>"
                                href="<?php echo e(route('vacations.index', ['all' => 'true'])); ?>">Show All Vacations</a></li>
                        <li><a class="dropdown-item <?php echo e(is_null(request('upcoming')) && is_null(request('ongoing')) && is_null(request('past')) && is_null(request('all')) ? 'active' : ''); ?>"
                                href="<?php echo e(route('vacations.index')); ?>">Show Current and Future Vacations</a></li>
                    </ul>
                </div>
            </div>



            <?php echo e($vacations->appends(request()->except('page'))->links('vendor.pagination.simple-bootstrap-5')); ?>

            <div class="row">
                <?php $__currentLoopData = $vacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $daysToStart = \Carbon\Carbon::now()->diffInDays(
                            \Carbon\Carbon::parse($vacation->start_date),
                            false,
                        );
                    ?>
                    <div class="col-md-4 col-sm-6 col-xs-12 mb-4">
                        <div class="card">
                            <div
                                class="card-header
<?php if($daysToStart > 0): ?> bg-info
<?php elseif(\Carbon\Carbon::today()->greaterThan(\Carbon\Carbon::parse($vacation->end_date))): ?>
bg-secondary
<?php else: ?>
bg-success <?php endif; ?>
">
                                Vacation #<?php echo e($vacation->id); ?> - <?php echo e($vacation->employee->first_name); ?>

                                <?php echo e($vacation->employee->last_name); ?>

                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Employee Details</h5>
                                <p class="card-text">
                                    Name:
                                    <?php if($vacation->employee->training == 0): ?>
                                        <a
                                            href="<?php echo e(route('employee.show', ['employee' => $vacation->employee->id])); ?>"><?php echo e($vacation->employee->first_name); ?>

                                            <?php echo e($vacation->employee->last_name); ?>

                                        </a>
                                    <?php elseif($vacation->employee->training == 1): ?>
                                        <a
                                            href="<?php echo e(route('trainee.show', ['trainee' => $vacation->employee->id])); ?>"><?php echo e($vacation->employee->first_name); ?>

                                            <?php echo e($vacation->employee->last_name); ?>

                                        </a>
                                    <?php endif; ?>


                                    <br>
                                    Email: <?php echo e($vacation->employee->email); ?>

                                </p>
                                <p class="card-text">
                                    <strong>Start Date:</strong>
                                    <?php echo e(\Carbon\Carbon::parse($vacation->start_date)->toFormattedDateString()); ?>

                                    <br>
                                    <strong>End Date:</strong>
                                    <?php echo e(\Carbon\Carbon::parse($vacation->end_date)->toFormattedDateString()); ?>


                                    <?php if($daysToStart > 0): ?>
                                        <br><span class="badge bg-warning text-dark">Starts in <?php echo e($daysToStart); ?>

                                            day(s)</span>
                                    <?php endif; ?>
                                </p>
                                <p class="card-text">
                                    Status:
                                    <?php if($daysToStart > 0): ?>
                                        <span class="badge bg-info text-dark">Upcoming</span>
                                    <?php elseif(\Carbon\Carbon::today()->greaterThan(\Carbon\Carbon::parse($vacation->end_date))): ?>
                                        <span class="badge bg-secondary">Past</span>
                                    <?php else: ?>
                                        <span class="badge bg-success">Ongoing</span>
                                    <?php endif; ?>
                                </p>
                                <!-- Button trigger modal -->
                                <?php if($daysToStart > 0): ?>
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editModal<?php echo e($vacation->id); ?>">Edit</a>
                                <?php elseif(\Carbon\Carbon::today()->greaterThan(\Carbon\Carbon::parse($vacation->end_date))): ?>
                                <?php else: ?>
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editModal<?php echo e($vacation->id); ?>">Edit</a>
                                <?php endif; ?>


                                <button class="btn btn-danger"
                                    onclick="event.preventDefault(); document.getElementById('delete-vacation-form-<?php echo e($vacation->id); ?>').submit();">
                                    Delete
                                </button>
                                <form id="delete-vacation-form-<?php echo e($vacation->id); ?>"
                                    action="<?php echo e(route('vacations.destroy', $vacation)); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editModal<?php echo e($vacation->id); ?>" tabindex="-1"
                        aria-labelledby="editModalLabel<?php echo e($vacation->id); ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?php echo e($vacation->id); ?>">Edit Vacation End
                                        Date</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="<?php echo e(route('vacations.update', $vacation)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?> <!-- Laravel method to specify a PATCH request -->
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="end_date<?php echo e($vacation->id); ?>" class="form-label">End
                                                Date</label>
                                            <input type="date" class="form-control" id="end_date<?php echo e($vacation->id); ?>"
                                                name="end_date"
                                                value="<?php echo e($vacation->end_date instanceof \Carbon\Carbon ? $vacation->end_date->format('Y-m-d') : ''); ?>"
                                                required>


                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php echo e($vacations->appends(request()->except('page'))->links('vendor.pagination.bootstrap-5')); ?>

        </div>
    </div>
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Notification</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?php echo e(session('success')); ?>

                </div>
            </div>
        </div>
    </div>

</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successToast = new bootstrap.Toast(document.getElementById('successToast'));
        <?php if(session('success')): ?>
            successToast.show();
        <?php endif; ?>
    });
</script>

<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/vacations/index.blade.php ENDPATH**/ ?>