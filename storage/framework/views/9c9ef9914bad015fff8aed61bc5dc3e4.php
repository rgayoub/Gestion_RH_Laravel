<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Trained Staff</span>
    </div>
    <div class="mycontent">
        <div class="container-sm mt-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trained): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo e($trained->first_name); ?> <?php echo e($trained->last_name); ?>

                                    .
                                </h5>

                                <p class="card-text">
                                    <?php echo e($trained->phone_number); ?>

                                    <br>
                                    <?php echo e($trained->email); ?>

                                    <br>
                                    <span class="text-success"><?php echo e($trained->position->name); ?></span>

                                    <br>
                                    <strong><?php echo e($trained->uuid); ?></strong>

                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">End Date : <?php echo e($trained->updated_at); ?></small>
                                <div class="dropdown float-end">
                                    <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-gear-fill"></i>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo e(route("trained.show" , ["id" => $trained->id])); ?>">Show</a></li>
                                        <li><a class="dropdown-item" href="<?php echo e(route("onboard-confirm" , ["id" => $trained->id])); ?>">Hire</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/private/trainee/trained.blade.php ENDPATH**/ ?>