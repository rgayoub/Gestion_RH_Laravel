<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"> Edit Position : <?php echo e($data->name); ?></span>
    </div>

    <div class="mycontent">
        <div class="container-sm mt-5">
            <hr>
            <form class="row g-3" method="POST" action="<?php echo e(route('positions.update', ['position' => $data->id])); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="col-md-6">
                    <label for="positionName" class="form-label">Position Name</label>
                    <input type="text" class="form-control" id="positionName" value="<?php echo e($data->name); ?>" name="name" placeholder="Enter position name">
                </div>
                <div class="col-md-6">
                    <label for="positionSalary" class="form-label">Salary</label>
                    <input type="number" class="form-control" id="positionSalary" value="<?php echo e($data->salary); ?>" name="salary" placeholder="Enter salary amount">
                </div>
                <div class="col-md-4">
                    <label for="numberOfEmployees" class="form-label">Number of Assigned Employees</label>
                    <input type="text" class="form-control" id="numberOfEmployees" value="<?php echo e($data->employees->count()); ?>" disabled>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo e(route("positions.delete" , ["position" => $data->id])); ?>" class="btn btn-danger" role="button">Delete</a>
                </div>
            </form>
            <hr>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/positions/edit.blade.php ENDPATH**/ ?>