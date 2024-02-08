<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Album;
use App\Models\category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Video;
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
        $post = Post::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $featured_post = Post::where('status', 1)->where('featured', 1)->latest()->get()->first();
        $liked_post = Post::where('status', 1)->get()->sortBy('visitor');
        $gadget = category::where('title', 'Gadget')->first();
        $telecom = category::where('title', 'Telecom')->first();
        $featured_video = Video::where('status', 1)->where('featured', 1)->latest()->get()->first();
        $video = Video::where('status', 1)->where('id', '!=', $featured_video->id)->get();
        if ($gadget) {
            $gadget_posts = Post::where('category_id', $gadget->id)->where('status', 1)->where('featured', 0)->get();
            $gadget_featured = Post::where('category_id', $gadget->id)->where('featured', 1)->get();
        }
        if ($telecom) {
            $telecom_featured = Post::where('category_id', $telecom->id)->where('status', 1)->where('featured', 1)->latest()->get()->first();
            $telecom_posts = Post::where('category_id', $telecom->id)->where('status', 1)->where('id', '!=', $telecom_featured->id)->get();
        }
        $data = [
            'post' => $post,
            'featured_post' => $featured_post,
            'liked_post' => $liked_post,
            'gadget_posts' => $gadget_posts,
            'gadget_featured' => $gadget_featured,
            'telecom_posts' => $telecom_posts,
            'telecom_featured' => $telecom_featured,
            'featured_video' => $featured_video,
            'video' => $video,
        ];
        return view(parent::loadDefaultDataToView($this->view_path . '.index'), compact('data'));
    }

    public function single_post(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('visitor');
        $category_id = $post->category_id;
        $related_posts = [];
        if ($post) {
            $related_posts = Post::where('category_id', $category_id)->where('status', 1)->where('id', '!=', $post->id)->get();
        }
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
        $featured_other = [];
        if ($featured_post) {
            $featured_other = Post::get()->sortBy('visitor')->where('category_id', $category_id)->where('status', 1)->where('featured', 1)->where('id', '!=', $featured_post->id);
        }
        $post = Post::where('category_id', $category_id)->where('status', 1)->where('featured', 0)->get();
        $latest = Post::where('status', 1)->latest()->get();
        $liked = Post::get()->sortBy('visitor')->where('status', 1);
        $data = [
            'category' => $category,
            'featured_post' => $featured_post,
            'featured_other' => $featured_other,
            'post' => $post,
            'latest' => $latest,
            'liked' => $liked,
        ];
        return view(parent::loadDefaultDataToView($this->view_path . '.category-page'), compact('data'));
    }
    public function featured_update(Request $request)
    {
        $latest_featured = Post::where('status', 1)->where('featured', 1)->latest()->first();
        $other_featured = [];
        if ($latest_featured) {
            $other_featured = Post::get()->sortBy('visitor')->where('status', 1)->where('featured', 1)->where('id', '!=', $latest_featured->id);
        }
        $latest = Post::where('status', 1)->latest()->get();
        $liked = Post::get()->sortBy('visitor')->where('status', 1);
        $data = [
            'latest_featured' => $latest_featured,
            'other_featured' => $other_featured,
            'latest' => $latest,
            'liked' => $liked,
        ];
        return view(parent::loadDefaultDataToView($this->view_path . '.featured-updates'), compact('data'));
    }
    public function latest_update(Request $request)
    {
        $latest_update = Post::where('status', 1)->latest()->first();
        $other_update = [];
        if ($latest_update) {
            $other_update = Post::get()->sortBy('visitor')->where('status', 1)->where('id', '!=', $latest_update->id);
        }
        $latest = Post::where('status', 1)->latest()->get();
        $liked = Post::get()->sortBy('visitor')->where('status', 1);
        $data = [
            'latest_update' => $latest_update,
            'other_update' => $other_update,
            'latest' => $latest,
            'liked' => $liked,
        ];
        return view(parent::loadDefaultDataToView($this->view_path . '.latest-updates'), compact('data'));
    }
    public function most_read(Request $request)
    {
        $featured_top_viewed = Post::where('status', 1)->where('featured', 1)->orderBy('visitor', 'desc')->first();
        $featured_most_viewed = [];
        if ($featured_top_viewed) {
            $featured_most_viewed = Post::get()->sortByDesc('visitor')->where('status', 1)->where('featured', 1)->where('id', '!=', $featured_top_viewed->id);
        }
        $other_most_viewed = Post::get()->sortByDesc('visitor')->where('status', 1)->where('featured', 0);
        $post = Post::where('status', 1)->get();
        $data = [
            'featured_top_viewed' => $featured_top_viewed,
            'featured_most_viewed' => $featured_most_viewed,
            'other_most_viewed' => $other_most_viewed,
            'post' => $post,
        ];
        return view(parent::loadDefaultDataToView($this->view_path . '.most-read'), compact('data'));
    }
    public function gallery(Request $request)
    {
        $data = [];
        $data['gallery'] = Gallery::where('status', '=', 1)->orderBy('id', 'ASC')->get();
        return view(parent::loadDefaultDataToView($this->view_path . '.gallery'), compact('data'));
    }
    public function album(Request $request, $id)
    {
        if ($request->id) {
            $data['album'] = Album::where('gallery_id', $id)->orderBy('id', 'DESC')->get();
        }
        return view(parent::loadDefaultDataToView($this->view_path . '.album'), compact('data'));
    }
}
