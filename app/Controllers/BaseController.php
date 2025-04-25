<?php

namespace App\Controllers;

use PHPFramework\Controller;

class BaseController extends Controller
{

    public function __construct()
    {
        $categories = cache()->get('categories');
        if (!$categories) {
            $categories = db()->findAll('categories');
            cache()->set('categories', $categories);
        }
        app()->set('categories', $categories);

        $recent_posts = db()->query("SELECT title, slug, image, DATE_FORMAT(created_at, '%b %e, %Y') as created_at FROM posts ORDER BY id DESC LIMIT 5")->get();
        app()->set('recent_posts', $recent_posts);

        $tags = db()->findAll('tags');
        app()->set('tags', $tags);
    }
}