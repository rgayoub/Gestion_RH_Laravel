<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    
    .card-header {
        background-color: #007bff;
        color: #ffffff;
    }
    .card-body {
        padding: 2rem;
        text-align: center;
    }
    .card-title {
        margin-bottom: 1.5rem;
    }
    @media (max-width: 768px) {
        .card-body {
            padding: 1rem;
        }
    }
    .info-text {
        margin-top: 20px;
        font-style: italic;
        color: #6c757d; /* Bootstrap's secondary text color */
    }
</style>

<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">End Training</span>
    </div>
    <div class="mycontent">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>End Trainee's Training Session</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Trainee Name: <?php echo e($trainee->first_name); ?> <?php echo e($trainee->last_name); ?></h5>
                    <p class="card-text">You are concluding the training for <?php echo e($trainee->first_name); ?>. Please ensure all assessments and evaluations have been completed before finalizing the training process.</p>
                    <a href="<?php echo e(route('trainee.endTrainingPdf', ['id' => $trainee->id])); ?>" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Download the certificate for the completed training.">
                        Download Training Certificate
                    </a>
                    <form method="post" action="<?php echo e(route('trainee.endTraining', ['id' => $trainee->id])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <button type="submit" class="btn btn-danger">End Training</button>
                    </form>
                    <p class="info-text">Note: Ending the training will archive all trainee data and remove them from the active training roster.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/private/trainee/end-training.blade.php ENDPATH**/ ?>