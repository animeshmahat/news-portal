<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

class DashboardController extends BaseController
{
    protected $base_route = "admin.index";
    protected $view_path = "admin.index";
    protected $panel = "News";
    public function index()
    {
        $category['row'] = DB::table('categories')->get();
        $post['row'] = DB::table('posts')->get();
        $gallery['row'] = DB::table('galleries')->get();
        $video['row'] = DB::table('videos')->get();
        $data['row'] = DB::table('users')->get();

        return view(parent::loadDefaultDataToView($this->base_route), compact('category', 'post', 'gallery', 'video', 'data'));
    }
}
