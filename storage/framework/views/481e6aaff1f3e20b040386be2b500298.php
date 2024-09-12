<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Edit Schedule</span>
    </div>
    <div class="mycontent">
        <div class="container-sm mt-5">
            <form action="<?php echo e(route('schedules.update', $schedule->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?> <!-- Important for Laravel to recognize it as an update operation -->
                <div class="mb-3">
                    <label for="scheduleName" class="form-label">Schedule Name</label>
                    <input type="text" class="form-control" id="scheduleName" name="scheduleName"
                        placeholder="Enter schedule name" value="<?php echo e(old('scheduleName', $schedule->name)); ?>" required>
                </div>
                <h2 class="mb-3">Weekday Time Selector</h2>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Select Days</label>
                        <?php $__currentLoopData = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="<?php echo e(strtolower($day)); ?>"
                                    name="days[]" value="<?php echo e($day); ?>"
                                    <?php echo e(in_array($day, old('days', explode(',', $schedule->days_of_week))) ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="<?php echo e(strtolower($day)); ?>"><?php echo e($day); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="col">
                        <label for="startTime" class="form-label">Start Time</label>
                        <input type="text" class="form-control mb-3 timepicker" id="startTime" name="startTime"
                            value="<?php echo e(old('startTime', $schedule->start_time)); ?>">

                        <label for="endTime" class="form-label">End Time</label>
                        <input type="text" class="form-control mb-3 timepicker" id="endTime" name="endTime"
                            value="<?php echo e(old('endTime', $schedule->end_time)); ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
        <!-- Toast -->
        <div class="toast" id="validationToast">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Validation Error</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body bg-white">
                <!-- Error messages will be inserted here -->
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if($errors->any()): ?>
                let errorMessage = `<ul>`;
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    errorMessage += `<li><?php echo e($error); ?></li>`;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                errorMessage += `</ul>`;

                document.querySelector('#validationToast .toast-body').innerHTML = errorMessage;
                var toast = new bootstrap.Toast(document.getElementById('validationToast'));
                toast.show();
            <?php endif; ?>
        });
    </script>
</section>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr(".timepicker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
</script>

<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/schedules/edit.blade.php ENDPATH**/ ?>