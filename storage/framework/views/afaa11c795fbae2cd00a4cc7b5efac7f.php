<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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
        <span class="text"> All Terminated Employees </span>
    </div>
    <div class="mycontent">
        <div class="mt-5">
            <div>
                <form action="<?php echo e(route('employee.index')); ?>" method="GET" class="d-flex float-start">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search"
                        aria-label="Search" style="width: 400px" value="<?php echo e(request('search')); ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <a class="btn btn-info ms-2" href="<?php echo e(route('employee.index')); ?>" role="button">go back</a>
                </form>
                <div class="float-end">
                    <?php echo e($data->appends(request()->input())->links('vendor.pagination.simple-bootstrap-5')); ?>

                </div>
            </div>
        </div>
        <br>
        <br>

        <table class="table table-bordered table-danger">
            <thead>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Date of birth</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

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
                                                    <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>'s Image</h5>
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

                        <td><?php echo e($employee->first_name); ?></td>
                        <td><?php echo e($employee->last_name); ?></td>
                        <td><?php echo e($employee->phone_number); ?></td>
                        <td><?php echo e($employee->email); ?></td>
                        <td><?php echo e($employee->position->name); ?></td>
                        <td><?php echo e($employee->salary); ?></td>
                        <td><?php echo e($employee->date_of_birth); ?></td>
                        <td>
                            <div class="btn-group float-end" role="group" aria-label="Basic outlined example">
                                <a href="<?php echo e(route('employees.show.terminated', ['id' => $employee->id])); ?>"
                                    class="btn btn-outline-primary">show</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#restoreEmployeeModal">
                                    Restore
                                </button>
                                <!-- Restore Employee Modal -->
                                <div class="modal fade" id="restoreEmployeeModal" tabindex="-1"
                                    aria-labelledby="restoreEmployeeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="restoreEmployeeModalLabel">Restore Employee
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to restore <?php echo e($employee->first_name); ?>

                                                <?php echo e($employee->last_name); ?>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-success"
                                                    onclick="restoreEmployee('<?php echo e($employee->id); ?>')">Restore</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function restoreEmployee(employeeId) {
        $.ajax({
            url: "<?php echo e(url('employees/restore')); ?>/" + employeeId,
            method: 'POST',
            data: {
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(result) {
                window.location.reload(); // Reload the page to reflect changes
            },
            error: function(request, status, error) {
                alert('Employee restoration failed.');
            }
        });
    }
</script>
<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/private/employee/terminated.blade.php ENDPATH**/ ?>