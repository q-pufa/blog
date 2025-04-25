<div class="py-xxl-5">
    <div class="col-xxl-12">
        <div class="contact card shadow rounded-5 p-4">
            <form action="<?= base_url('/login'); ?>" method="post" role="form" class="php-email-form" id="login-form">
                <div class="row gy-4">
                    <div class="form-group">
                        <label for="email"></label><input type="email" class="form-control <?= get_validation_class('email', $errors ?? []); ?>" name="email" id="email" placeholder="Your Email" value="<?= old('email'); ?>">
                        <?= get_errors('email', $errors ?? []); ?>
                    </div>
                    <div class="form-group">
                        <label for="password"></label><input type="password" name="password" class="form-control <?= get_validation_class('password', $errors ?? []); ?>" id="password" placeholder="Password" value="<?= old('password'); ?>">
                        <?= get_errors('password', $errors ?? []); ?>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                        <button type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

