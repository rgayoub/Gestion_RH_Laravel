<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


<style>
    .btn-modal-trigger {
        padding: 0;
        margin: 0;
        border: none;
        background-color: transparent;
        cursor: pointer;
    }
</style>
<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"> All Trainees </span>
    </div>
    <div class="mycontent">
        <div class="mt-5">
            <div>
                <form action="<?php echo e(route('trainee.index')); ?>" method="GET" class="d-flex float-start">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search"
                        aria-label="Search" style="width: 400px" value="<?php echo e(request('search')); ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="float-end">
                    <?php echo e($data->appends(request()->input())->links('vendor.pagination.simple-bootstrap-5')); ?>

                </div>
            </div>
        </div>
        <br>
        <br>



        <table class="table table-responsive table-hover table-bordered">
            <thead class="table-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Training in / Position</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr <?php if($employee->isOnVacation()): ?> class="bg-warning" <?php endif; ?>>
                        <td>
                            <button type="button" class="btn btn-link btn-modal-trigger p-0" data-bs-toggle="modal"
                                data-bs-target="#imageModal<?php echo e($employee->id); ?>">
                                <img src="<?php echo e($employee->image && Storage::disk('public')->exists($employee->image) ? asset('storage/' . $employee->image) : asset('default_images/user.png')); ?>"
                                    alt="<?php echo e($employee->first_name); ?>'s Image" class="rounded-circle"
                                    style="height: 40px; width: 40px;">
                            </button>
                            <!-- Modal for displaying the full-size image -->
                            <div class="modal fade" id="imageModal<?php echo e($employee->id); ?>" tabindex="-1"
                                aria-labelledby="imageModalLabel<?php echo e($employee->id); ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel<?php echo e($employee->id); ?>">
                                                <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>'s Image
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo e(asset('storage' . $employee->image)); ?>" class="img-fluid"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><?php echo e($employee->first_name); ?></td>
                        <td><?php echo e($employee->last_name); ?></td>
                        <td><?php echo e($employee->email); ?></td>
                        <td><?php echo e($employee->position->name); ?></td>
                        <td><?php echo e($employee->date_of_birth); ?></td>
                        <td>
                            <?php if($employee->isOnVacation()): ?>
                        <?php if($employee->schedule_id == null): ?>
                            <span class="badge pill text-bg-danger">!Off</span>
                        <?php else: ?>
                            <span class="badge rounded-pill text-bg-danger">Off</span>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($employee->schedule_id == null): ?>
                            <span class="badge rounded-pill text-bg-warning">on</span>
                        <?php else: ?>
                            <span class="badge rounded-pill text-bg-success">on</span>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(!$employee->cv): ?>
                        <i class="fas fa-file-pdf"></i>
                    <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Action buttons">
                                <a href="<?php echo e(route('trainee.show', ['trainee' => $employee->id])); ?>"
                                    class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?php echo e(route('trainee.edit', ['trainee' => $employee->id])); ?>"
                                    class="btn btn-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit Details">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="<?php echo e(route('onboard-confirm', ['id' => $employee->id])); ?>"
                                    class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Onboard Employee">
                                    <i class="bi bi-person-plus-fill"></i>
                                </a>
                                <a href="<?php echo e(route('trainee.endTraining.show', ['id' => $employee->id])); ?>"
                                    class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="End Training">
                                    <i class="bi bi-flag-fill"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>


        <?php echo e($data->links('vendor.pagination.bootstrap-5')); ?>

    </div>
    </div>
</section>


<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/private/trainee/index.blade.php ENDPATH**/ ?>