<?php echo view()->renderPartial('incs/header', ['title' => $title]); ?>
<main class="main">
    <?php get_alerts(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?= $this->content; ?>
            </div>
            <div class="col-lg-4 sidebar">
                <div class="widgets-container">
                    <!-- Blog Author Widget 2 -->
                    <div class="blog-author-widget-2 widget-item">
                        <div class="d-flex flex-column align-items-center">
                            <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
                            <h4>Jane Smith</h4>
                            <div class="social-links">
                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
                            </div>
                            <p>
                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium.
                                Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium
                                ut unde voluptas.
                            </p>
                        </div>
                    </div><!--/Blog Author Widget 2 -->
                    <!-- Search Widget -->
                    <div class="search-widget widget-item">
                        <h3 class="widget-title">Search</h3>
                        <form action="<?= base_url('/search') ?>">
                            <input type="text" name="s" placeholder="Search...">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!--/Search Widget -->
                    <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">
                        <?php $recent_posts = app()->get('recent_posts', []); ?>
                        <?php if ($recent_posts): ?>
                            <h3 class="widget-title">Recent Posts</h3>
                            <?php foreach ($recent_posts as $recent_post): ?>
                                <div class="post-item">
                                    <img src="<?= $recent_post['image']; ?>" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a href="<?= base_url("/post/{$recent_post['slug']}"); ?>"><?= $recent_post['title']; ?></a></h4>
                                        <time><?= $recent_post['created_at']; ?></time>
                                    </div>
                                </div><!-- End recent post item-->
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div><!--/Recent Posts Widget -->
                    <!-- Tags Widget -->
                    <?php $tags = app()->get('tags', []);  ?>
                    <?php if ($tags): ?>
                    <div class="tags-widget widget-item">
                        <h3 class="widget-title">Tags</h3>
                        <ul>
                            <?php foreach ($tags as $tag): ?>
                            <li><a href="<?= base_url("/tag/{$tag['slug']}"); ?>"><?= $tag['title'];  ?></a></li>
                           <?php endforeach; ?>
                        </ul>
                    </div><!--/Tags Widget -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php echo view()->renderPartial('incs/footer'); ?>
