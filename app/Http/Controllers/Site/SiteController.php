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
        $data['post'] = Post::where('status', 1)->get();
        $data['featured_post'] = Post::where('status', 1)->where('featured', 1)->latest()->get()->first();
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
}
