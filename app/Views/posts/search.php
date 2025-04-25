<div class="page-title position-relative">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <nav class="breadcrumbs">
            <ol>
                <li><a href="<?= base_url('/'); ?>">Home</a></li>
                <li class="current">Search Results</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->
<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">
    <div class="container">
        <div class="row gy-4">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="col-lg-6">
                        <article class="position-relative h-100">
                            <div class="post-img position-relative overflow-hidden">
                                <img src="<?= $post['image']; ?>" class="img-fluid" alt="">
                                <span class="post-date"><?= $post['created_at']; ?></span>
                            </div>
                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title"><?= $post['title']; ?></h3>
                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">John Doe</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi-folder2"></i> <span class="ps-2"><a
                                                    href="<?= base_url("/category/{$post['c_slug']}"); ?>"><?= $post['c_title']; ?></a></span>
                                    </div>
                                </div>
                                <p>
                                    <?= $post['excerpt']; ?>
                                </p>
                                <hr>
                                <a href="<?= base_url("/post/{$post['slug']}"); ?>"
                                   class="readmore stretched-link"><span>Read More</span><i
                                            class="bi bi-arrow-right"></i></a>
                            </div>
                        </article>
                    </div><!-- End post list item -->
                <?php endforeach; ?>
                <!-- Blog Pagination Section -->
                <?php if ($pagination->count_pages > 1): ?>
                    <section id="blog-pagination" class="blog-pagination section">
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul>
                                    <?= $pagination; ?>
                            </div>
                        </div>
                    </section><!-- /Blog Pagination Section -->
                <?php endif; ?>
            <?php else: ?>
                <p>Not found posts...</p>
            <?php endif; ?>
        </div>
    </div>
</section><!-- /Blog Posts Section -->

