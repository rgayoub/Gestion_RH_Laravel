<?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link href="<?php echo e(asset('css/support.css')); ?>" rel="stylesheet">

<div class="background">
    <div class="container">
        <div class="screen">
            <div class="screen-header">
                <div class="screen-header-left">
                    <div class="screen-header-button close"></div>
                    <div class="screen-header-button maximize"></div>
                    <div class="screen-header-button minimize"></div>
                </div>
                <div class="screen-header-right">
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                </div>
            </div>
            <div class="screen-body">
                <div class="screen-body-item left">
                    <div class="app-title">
                        <span>CONTACT</span>
                        <span>US</span>
                    </div>
                    <div class="app-contact">CONTACT INFO : 05 37 71 52 01 <br>CONTACT INFO : 05 37 56 35 93 </div>
                </div>
                <div class="screen-body-item">
                    <div class="app-form">
                        <div class="app-form-group">
                            <input id="name" class="app-form-control" placeholder="NAME">
                        </div>
                        <div class="app-form-group">
                            <input id="email" class="app-form-control" placeholder="EMAIL">
                        </div>
                        <div class="app-form-group message">
                            <input id="message" class="app-form-control" placeholder="MESSAGE">
                        </div>
                        <div class="app-form-group buttons">
                            <button id="cancel" class="app-form-button">CANCEL</button>
                            <button id="send" class="app-form-button">SEND</button>
                        </div>
                        <div id="success-message" style="display: none; color: green; margin-top: 10px;">
                            Message was sent successfully !
                        </div>
                        <div id="error-message" style="display: none; color: red; margin-top: 10px;">
                            Please complete all fields.
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('send').addEventListener('click', function() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;

        if (name && email && message) {
            document.getElementById('success-message').style.display = 'block';
            document.getElementById('error-message').style.display = 'none';
        } else {
            document.getElementById('success-message').style.display = 'none';
            document.getElementById('error-message').style.display = 'block';
        }
    });

    document.getElementById('cancel').addEventListener('click', function() {
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('message').value = '';
        document.getElementById('success-message').style.display = 'none';
        document.getElementById('error-message').style.display = 'none';
    });
</script>




<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/support.blade.php ENDPATH**/ ?>