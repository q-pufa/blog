<div class="py-xxl-5">
    <div class="col-xxl-12">
        <div class="card shadow rounded-5 p-4">
            <form action="<?= base_url('/register'); ?>" method="post" role="form" class="php-email-form"
                  enctype="multipart/form-data">
                <div class="row gy-4">
                    <div class="form-group col-md-6 mb-2">
                        <label for="name"></label><input type="text" name="name" class="form-control <?= get_validation_class('name', $errors ?? []); ?>" id="name" placeholder="Your Name" value="<?= old('name'); ?>">
                        <?= get_errors('name', $errors ?? []); ?>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="email"></label><input type="email" class="form-control <?= get_validation_class('email', $errors ?? []); ?>" name="email" id="email" placeholder="Your Email" value="<?= old('email'); ?>">
                        <?= get_errors('email', $errors ?? []); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password"></label><input type="password" name="password" class="form-control <?= get_validation_class('password', $errors ?? []); ?>" id="password" placeholder="Password" value="<?= old('password'); ?>">
                        <?= get_errors('password', $errors ?? []); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="repassword"></label><input type="password" class="form-control <?= get_validation_class('repassword', $errors ?? []); ?>" name="repassword" id="repassword" placeholder="Confirm Password" value="<?= old('repassword'); ?>">
                        <?= get_errors('repassword', $errors ?? []); ?>
                    </div>
                    <div class="col-md-12">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" name="avatar"
                               class="form-control <?= get_validation_class('avatar', $errors ?? []); ?>" id="avatar">
                        <?= get_errors('avatar', $errors ?? []); ?>
                    </div>
                    <div class="md-12 text-center">
                        <button type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

