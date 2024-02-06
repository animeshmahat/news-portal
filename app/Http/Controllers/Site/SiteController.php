<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Admin\BaseController;
use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class SiteController extends BaseController
{
    protected $base_route = "site";
    protected $view_path  = "site";
    protected $panel = "News-Portal";
    protected $model;

    public function __construct()
    {
    }
    public function index(Request $request)
    {
        $post = Post::where('status', 1)->get();
        $featured_post = Post::where('status', 1)->where('featured', 1)->latest()->get()->first();
        $gadget = category::where('title', 'Gadget')->first();
        $telecom = category::where('title', 'Telecom')->first();
        if ($gadget) {
            $gadget_posts = Post::where('category_id', $gadget->id)->where('status', 1)->get();
            $telecom_posts = Post::where('category_id', $telecom->id)->where('status', 1)->get();
        }
        $data = [
            'post' => $post,
            'featured_post' => $featured_post,
            'gadget_posts' => $gadget_posts,
            'telecom_posts' => $telecom_posts,
        ];
        return view(parent::loadDefaultDataToView($this->view_path . '.index'), compact('data'));
    }

    public function single_post(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('visitor');
        $category_id = $post->category_id;
        $related_posts = Post::where('category_id', $category_id)->where('status', 1)->where('id', '!=', $post->id)->get();
        $data = [
            'post' => $post,
            'related_posts' => $related_posts,
            'visitor_count' => $post->visitor
        ];
        return view(parent::loadDefaultDataToView($this->view_path . '.single-post'), compact('data'));
    }

    public function category_page(Request $request, $title)
    {
        $category = category::where('title', $title)->firstOrFail();
        $category_id = $category->id;
        $featured_post = Post::where('category_id', $category_id)->where('status', 1)->where('featured', 1)->latest()->get()->first();
        $post = Post::where('category_id', $category_id)->where('status', 1)->where('id', '!=', $featured_post->id)->get();
        $latest = Post::where('status', 1)->latest()->get();
        $liked = Post::get()->sortByDesc('visitor');
        $data = [
            'category' => $category,
            'featured_post' => $featured_post,
            'post' => $post,
            'latest' => $latest,
            'liked' => $liked,
        ];
        return view(parent::loadDefaultDataToView($this->view_path . '.category-page'), compact('data'));
    }
}
