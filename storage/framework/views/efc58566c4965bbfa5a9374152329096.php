
<div class="card border-0 shadow" style="max-width: 450px">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="<?php if($employee->image): ?> <?php echo e(asset('storage/' . $employee->image)); ?> <?php else: ?> <?php echo e(asset('default_images/user.png')); ?> <?php endif; ?>"
                    alt="Employee Image" class="img-fluid rounded-circle"
                    style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <h3 class="mb-3"><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></h3>
                <p class="mb-1"><strong>Role:</strong> <?php echo e($employee->position->name); ?></p>
                <p class="mb-1"><strong>Email:</strong> <?php echo e($employee->email); ?></p>
                <p class="mb-1"><strong>Phone:</strong> <?php echo e($employee->phone_number); ?></p>
                <p class="mb-0"><strong>UUID:</strong> <?php echo e($employee->uuid); ?></p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/private/employee/components/card.blade.php ENDPATH**/ ?>