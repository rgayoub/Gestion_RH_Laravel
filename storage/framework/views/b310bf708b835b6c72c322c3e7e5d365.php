<?php
    // Get the last segment of the current URL
    $lastSegment = collect(request()->segments())->last();

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="\">
            <img src="<?php echo e(asset('default_images/Logo.png')); ?>" alt="Logo" style="height: 40px;">
        </a>

          

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($lastSegment == 'login'): ?> active <?php endif; ?>"
                                href="<?php echo e(route('login')); ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($lastSegment == 'support'): ?> active <?php endif; ?>" href="/support">Support</a>
                        </li>

                    <?php endif; ?>

                    

                    
                </ul>
            </div>
    </div>
</nav>

<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/components/nav.blade.php ENDPATH**/ ?>