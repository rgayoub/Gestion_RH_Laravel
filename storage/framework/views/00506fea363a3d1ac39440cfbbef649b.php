<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .profile-container {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .profile-container:hover {
        transform: scale(1.03);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }

    .profile-image {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 20px;
    }

    .profile-image img {
        width: 100%;
        height: auto;
    }

    .social-icons {
        list-style-type: none;
        padding: 0;
    }

    .social-icons li {
        display: inline;
        margin-right: 10px;
    }

    .social-icons a {
        color: #007bff;
        /* Bootstrap primary color */
        font-size: 24px;
    }
</style>

<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Profile</span>
    </div>

</section>

<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/about.blade.php ENDPATH**/ ?>