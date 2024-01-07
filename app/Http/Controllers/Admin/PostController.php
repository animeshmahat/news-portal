<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends BaseController
{
    protected $base_route = "post.index";
    protected $view_path = "admin.post";
    protected $panel = "Post";
    protected $model;
    public function __construct()
    {
        $this->model = new Post;
    }
    public function index()
    {
        return view('admin.post.index');
    }
}
