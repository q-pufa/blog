<?php echo view()->renderPartial('incs/header', ['title' => $title]); ?>

<main class="main">

    <?php get_alerts(); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?= $this->content; ?>
            </div>

        </div>
    </div>

</main>

<?php echo view()->renderPartial('incs/footer'); ?>
