<?php

namespace App\Controllers;

use PHPFramework\Pagination;

class CategoryController extends BaseController
{
    public function show()
    {
        $slug = router()->route_params['slug'];
        $category = db()->query("SELECT * FROM categories WHERE slug = ?", [$slug])->getOne();
        if (!$category) {
            abort();
        }
        $page = (int)request()->get('page', 1);
        $total = db()->query("SELECT COUNT(*) FROM posts WHERE category_id = ?", [$category['id']])->getColumn();
        $per_page = 4;
        $pagination = new Pagination($page, $per_page, $total);
        $start = $pagination->getStar();
        $title = $category['title'] . ($page > 1 ? " - Page {$page}" : "");

        $posts = db()->query("SELECT title, slug, excerpt, image, DATE_FORMAT(created_at, '%M %d') AS created_at FROM posts WHERE category_id = ? ORDER BY posts.created_at DESC LIMIT $start, $per_page", [$category['id']])->get();
        return view('categories/show', compact('title', 'category', 'pagination', 'posts'));
    }

}