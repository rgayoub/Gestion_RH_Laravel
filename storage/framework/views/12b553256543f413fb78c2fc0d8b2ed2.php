<?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    body {
        background-color: #f4f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-image: url('<?php echo e(asset('default_images/Atner.jpg')); ?>'); /* Remplacez 'your-image.jpg' par le nom de votre image */
        background-size: cover;
        background-position: center;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.8); /* Couleur de fond légèrement transparente */
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin-top: 2%;
        margin-bottom: 2%;
        max-width: 600px; /* Ajustement de la largeur maximale */
    }

    .form-control {
        border: 1px solid #ccd1d9;
        border-radius: 4px;
        height: 45px;
        padding: 10px;
    }

    .form-control:focus {
        border-color: #5d9cec;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(93, 156, 236, .6);
    }

    .btn-primary {
        background-color: #337ab7;
        border: none;
        border-radius: 4px;
        padding: 10px 15px;
        font-size: 16px;
        color: white;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #286090;
    }

    label {
        font-weight: 600;
        color: #333;
    }

    .invalid-feedback,
    .text-danger {
        color: #dc3545; /* Couleur de danger (rouge) de Bootstrap */
        font-weight: bold;
    }

    .header-text {
        text-align: center;
        margin-bottom: 20px;
        color: #333; /* Couleur du texte d'en-tête */
    }

    .header-text h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .header-text p {
        font-size: 16px;
        color: #666; /* Couleur du texte de sous-titre */
        line-height: 1.5;
    }

    .error-message {
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
        color: #dc3545; /* Couleur du message d'erreur */
        font-weight: bold;
        margin-top: 10px;
    }

    .error-message.show {
        display: block;
        opacity: 1;
    }

    .wrapper {
        width: 800px;
        height: 600px;
        position: relative;
        margin: 3% auto;
        box-shadow: 2px 18px 70px 0px #9D9D9D;
        overflow:hidden;
    }

    .login-text {
        width: 800px;
        height: 450px;
        background: linear-gradient(to left, #6CC3EF, #9C9C9C);
        position: absolute;
        top: -300px;
        box-sizing: border-box;
        padding: 6%;
        transition: all 0.5s ease-in-out;
        z-index: 11;
    }

    .text {
        margin-left: 20px;
        color: #fff;
        transition: all 0.5s ease-in-out;
        transition-delay: 0.3s;
    }

    .text a, .text a:visited {
        font-size: 36px;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        display: block;
    }

    .text hr {
        width: 10%;
        float: left;
        background-color: #fff;
        font-size: 16px;
    }

    .text input {
        margin-top: 30px;
        height: 40px;
        width: 300px;
        border-radius: 2px;
        border: none;
        background-color: #444;
        opacity: 0.6;
        outline: none;
        color: #fff;
        padding-left: 10px;
    }

    .text input[type=text] {
        margin-top: 60px;
    }

    .text button {
        margin-top: 60px;
        height: 40px;
        width: 140px;
        outline: none;
    }

    .text .login-btn {
        background: #fff;
        border: none;
        border-radius: 2px;
        color: #696a86;
    }

    .text .signup-btn {
        background: transparent;
        border: 2px solid #fff;
        border-radius: 2px;
        color: #fff;
        margin-left: 30px;
    }

    .cta {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #696a86;
        border: 2px solid #fff;
        position: absolute;
        bottom: -30px;
        left: 370px;
        color: #fff;
        outline: none;
        cursor: pointer;
        z-index: 11;
    }

    .call-text {
        background-color: #fff;
        width: 800px;
        height: 450px;
        position: absolute;
        bottom: 0;
        padding: 10%;
        box-sizing: border-box;
        text-align: center;
    }

    .call-text h1 {
        font-size: 42px;
        margin-top: 10%;
        color: #696a86;
    }

    .call-text h1 span {
        color: #333;
        font-weight: bolder;
    }

    .call-text button {
        height: 40px;
        width: 180px;
        border: none;
        border-radius: 20px;
        background: linear-gradient(to left, #ab68ca, #de67a3);
        color: #fff;
        font-weight: bolder;
        margin-top: 30px;
        cursor: pointer;
        outline: none;
    }

    .show-hide {
        display: block;
    }

    .expand {
        transform: translateY(300px);
    }
</style>

<div class="wrapper ">
    <div class="login-text">
        <button class="cta"><i class="fas fa-chevron-down fa-1x"></i></button>
        <div class="text">
            <a href="">Login</a>
            </div>
            <form id="login-form" action="<?php echo e(route('auth')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group col-md-8 col-sm-10 col-12 ">
                    <label class="" for="username">Username</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username"
                           name="username" value="<?php echo e(old('username')); ?>">
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo e($message); ?>.
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group col-md-8 col-sm-10 col-12 ">
                    <label class="" for="password">Password</label>
                    <input type="password" class="form-control m-lg-2 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password"
                           name="password">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo e($message); ?>.
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="error-message text-danger mt-3" id="error-message">
                    <strong>Incorrect username or password.</strong>
                </div>
                <div class="text">
                <button type="submit" class="login-btn">Login</button>
                </div>
            </form>

            <?php if($errors->has('credentials')): ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const errorMessage = document.getElementById('error-message');
                        errorMessage.classList.add('show');
                    });
                </script>
            <?php endif; ?>
        </div>
    <div class="call-text ">
        <h1>Welcome to the <span>HRMS</span> portal. Streamlining <span>HR</span> processes for better efficiency.</h1>
    </div>
    </div>



<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var cta = document.querySelector(".cta");
        var check = 0;

        cta.addEventListener('click', function(e){
            var text = e.target.nextElementSibling;
            var loginText = e.target.parentElement;
            text.classList.toggle('show-hide');
            loginText.classList.toggle('expand');
            if(check === 0) {
                cta.innerHTML = "<i class=\"fas fa-chevron-up\"></i>";
                check++;
            } else {
                cta.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
                check = 0;
            }
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/auth/login.blade.php ENDPATH**/ ?>