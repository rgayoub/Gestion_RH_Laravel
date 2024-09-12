<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .badge-hover-animate {
        transition: transform 0.3s ease, background-color 0.3s ease;
        /* Smooth transition for transform and color */
    }

    .badge-hover-animate:hover {
        transform: scale(1.4);
        /* Scales up the badge */
        /* Changes color on hover, adjust color as needed */
    }
</style>

<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"> Positions </span>
    </div>

    <div class="position-absolute top-0 end-0 m-3 d-flex">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoModal"
            data-bs-placement="left" title="Help Information">
            <i class="bi bi-info-circle"></i>
        </button>
    </div>
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="badge text-bg-primary rounded-pill me-2" style="font-size: 20px">
                                26
                            </span>
                            Currently, there are 26 employees assigned to this position. Click on the blue badge to view
                            details.
                        </li>
                        <li class="list-group-item">
                            <span class="badge text-bg-info rounded-pill me-2" style="font-size: 20px">
                                13
                            </span>
                            This position includes 13 trainees who are currently undergoing training. Click on the light
                            blue badge for more information.
                        </li>
                        <li class="list-group-item">
                            <span class="badge text-bg-warning rounded-pill me-2" style="font-size: 20px">
                                4
                            </span>
                            A total of 4 individuals have successfully completed their training for this position. Click
                            on the yellow badge to see their profiles.
                        </li>
                        <li class="list-group-item">
                            Click on the colored badges to explore detailed lists of people in each category associated
                            with the chosen position.
                        </li>
                    </ul>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mycontent">
        <div class="container-sm mt-5">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Position
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Position</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo e(route('positions.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" class="form-control" id="name" name="name">

                                </div>
                                <div class="mb-3">
                                    <label for="salary" class="form-label">Salary</label>
                                    <input type="numeric" class="form-control" id="salary" name="salary">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <ol class="list-group list-group-numbered">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start <?php if(!($position->employees()->count() > 0 || $position->trainees()->count() > 0)): ?> text-danger <?php endif; ?>">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?php echo e($position->name); ?></div>
                            Base Salary : <?php echo e($position->salary); ?>

                        </div>

                        <?php if($position->employees()->count() > 0 || $position->trainees()->count() > 0): ?>
                            <div class="btn-group btn-group-sm me-2" role="group" aria-label="Small button group">
                                <a href="<?php echo e(route('positions.edit', ['position' => $position->id])); ?>"
                                    class="btn btn-outline-primary" tabindex="-1" role="button"
                                    aria-disabled="true">edit</a>
                            </div>
                            <a
                                href="<?php echo e(route('positions.employees', ['position' => $position->id, 'status' => 'employee'])); ?>">
                                <span class="badge text-bg-primary rounded-pill badge-hover-animate"
                                    style="font-size: 20px">
                                    <?php echo e($position->employees()->count()); ?>

                                </span>
                            </a>
                            <a
                                href="<?php echo e(route('positions.employees', ['position' => $position->id, 'status' => 'trainee'])); ?>">
                                <span class="badge text-bg-info rounded-pill ms-3 badge-hover-animate"
                                    style="font-size: 20px">
                                    <?php echo e($position->trainees()->count()); ?>

                                </span>
                            </a>
                            <a
                                href="<?php echo e(route('positions.employees', ['position' => $position->id, 'status' => 'trained'])); ?>">
                                <span class="badge text-bg-warning rounded-pill ms-3 badge-hover-animate"
                                    style="font-size: 20px">
                                    <?php echo e($position->trained()->count()); ?>

                                </span>
                            </a>
                        <?php else: ?>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a href="<?php echo e(route('positions.edit', ['position' => $position->id])); ?>"
                                    class="btn btn-outline-primary" tabindex="-1" role="button"
                                    aria-disabled="true">edit</a>
                                <a href="<?php echo e(route('positions.delete', ['position' => $position->id])); ?>"
                                    class="btn btn-outline-danger" tabindex="-1" role="button"
                                    aria-disabled="true">delete</a>
                            </div>
                        <?php endif; ?>



                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
            <hr>


            <?php
                $totalEmployees = 0;
                $positionWithMostEmployees = null;
                $maxEmployeeCount = 0;
                $positionWithFewestEmployees = null;
                $minEmployeeCount = PHP_INT_MAX;
                $totalSalaryExpense = 0;
                $totalTrainees = 0;
                $positionNames = $data->pluck('name');
                $employeeCounts = $data->map(function ($position) {
                    return $position->employees()->count();
                });
                $traineeCounts = $data->map(function ($position) {
                    return $position->trainees()->count();
                });

            ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $employeeCount = $position->employees()->count();
                    $totalEmployees += $employeeCount;
                    if ($employeeCount > $maxEmployeeCount) {
                        $maxEmployeeCount = $employeeCount;
                        $positionWithMostEmployees = $position;
                    }
                    if ($employeeCount < $minEmployeeCount) {
                        $minEmployeeCount = $employeeCount;
                        $positionWithFewestEmployees = $position;
                    }
                    $totalSalaryExpense += $position->salary * $employeeCount;
                    $totalTrainees += $position->trainees()->count();
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            <?php echo $__env->make('positions.components.statistics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <!-- Include necessary scripts -->

            <!-- Chart canvas -->
            <?php echo $__env->make('positions.components.positionsChart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>

</section>
<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto text-danger">Error</strong>
                <small>position name</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php echo e($message); ?>

            </div>
        </div>
    </div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__errorArgs = ['salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto text-danger">Error</strong>
                <small>position salary</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php echo e($message); ?>

            </div>
        </div>
    </div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

<script>
    // Display the toast when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        var toastEl = document.getElementById('liveToast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
</script>
<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/positions/index.blade.php ENDPATH**/ ?>