<style>
    /* Sticky header style */
    thead th {
        position: sticky;
        top: 0;
        /* Set top to 0 so it sticks to the top of the table scroll area */
        background-color: #000;
        /* Dark background for the header */
        color: white;
        /* Light text for contrast */
        z-index: 2;
        /* Ensure the header is above other content */
    }
</style>


<table class="table table-bordered table-striped table-hover table-sm">
    <thead class="table-dark">
        <th><i class="bi bi-image"></i></th>
        <th>First Name <i class="bi bi-info-circle ms-1 float-end" title="Click on a row to see more details"></i></th>
        <th></i> Last Name</th>
        <th><i class="bi bi-telephone-fill"></i> Phone number</th>
        <th><i class="bi bi-envelope-fill"></i> Email</th>
        <th><i class="bi bi-briefcase-fill"></i> Position <span
                class="float-end text-info"><?php echo e(\App\Models\Position::all()->count()); ?></span></th>
        <th><i class="bi bi-currency-dollar"></i> Salary</th>
        <th></i> Status</th>
        <th><i class="bi bi-gear-fill"></i> Action</th>

    </thead>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-employee-id="<?php echo e($employee->id); ?>" data-position="<?php echo e($employee->position->name); ?>"
                <?php if($employee->hasUpcomingVacation()): ?> class="table-info" <?php endif; ?>>
                <td>
                    <?php if($employee->image && Storage::disk('public')->exists($employee->image)): ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-link btn-modal-trigger" data-bs-toggle="modal"
                            data-bs-target="#imageModal<?php echo e($employee->id); ?>">
                            <img src="<?php echo e(asset('storage/' . $employee->image)); ?>" alt=""
                                style="height: 40px; width: 40px; border-radius: 50%;">
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal<?php echo e($employee->id); ?>" tabindex="-1"
                            aria-labelledby="imageModalLabel<?php echo e($employee->id); ?>" aria-hidden="true">
                            <div class="modal-dialog modal-m">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel<?php echo e($employee->id); ?>">
                                            <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>'s Image
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?php echo e(asset('storage/' . $employee->image)); ?>" class="img-fluid"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Replace the image with a default image -->
                        <img src="<?php echo e(asset('default_images/user.png')); ?>" alt=""
                            style="height: 40px; width: 40px; border-radius: 50%;">
                    <?php endif; ?>
                </td>

                <td><strong><?php echo e($employee->first_name); ?></strong></td>
                <td><?php echo e($employee->last_name); ?></td>
                <td><?php echo e($employee->phone_number); ?></td>
                <td>
                    <a href="mailto:<?php echo e($employee->email); ?>" class="email-link" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Click to email <?php echo e($employee->email); ?>">
                        <?php echo e($employee->email); ?>

                    </a>
                </td>


                <td <?php if(request()->has('position') && !empty(request()->get('position'))): ?> class="bg-success p-2 text-white" <?php endif; ?>>
                    <?php echo e($employee->position->name); ?></td>

                <!-- Other cells -->
                <td>
                    <?php if($employee->position->salary < $employee->salary): ?>
                        <?php if($employee->salary == $maxSalaries[$employee->position_id]): ?>
                            <span class="text-monospace salary-number"
                                style="color: rgb(0, 140, 255)"><?php echo e(number_format($employee->salary, 0)); ?></span>
                        <?php else: ?>
                            <span class="text-monospace salary-number"
                                style="color: rgb(0, 173, 87)"><?php echo e(number_format($employee->salary, 0)); ?></span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="text-monospace salary-number"
                            style="color: rgb(230, 36, 36)"><?php echo e(number_format($employee->salary, 0)); ?></span>
                    <?php endif; ?>
                </td>


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

                    <div class="btn-group float-end" role="group" aria-label="Basic outlined example">
                        <a href="<?php echo e(route('employee.show', ['employee' => $employee->id])); ?>"
                            class="btn btn-outline-primary" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?php echo e(route('employee.edit', ['employee' => $employee->id])); ?>"
                            class="btn btn-outline-dark" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($data->links('vendor.pagination.bootstrap-5')); ?>

<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/private/employee/components/table.blade.php ENDPATH**/ ?>