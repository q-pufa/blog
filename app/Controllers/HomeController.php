<?php

namespace App\Controllers;

use PHPFramework\Pagination;

class HomeController extends BaseController
{

    public function index()
    {
        $page = (int)request()->get('page', 1);
        $total = db()->count('posts');
        $per_page = 4;
        $pagination = new Pagination($page, $per_page, $total);
        $start = $pagination->getStar();
        $title = 'Home page' . ($page > 1 ? " - Page {$page}" : "");

        $posts = db()->query("SELECT p.title, p.slug, p.excerpt, p.image, DATE_FORMAT(p.created_at, '%M %d') AS created_at, c.title AS c_title, c.slug AS c_slug FROM posts p JOIN categories c ON c.id = p.category_id ORDER BY p.created_at DESC LIMIT $start, $per_page")->get();


        return view('home', compact('title', 'posts', 'pagination'));
    }

}