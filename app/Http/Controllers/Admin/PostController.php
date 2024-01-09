<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use App\Models\user;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends BaseController
{
    protected $base_route = "post.index";
    protected $view_path = "admin.post";
    protected $panel = "Post";
    protected $model;
    protected $category;
    protected $user;
    public function __construct()
    {
        $this->model = new Post;
        $this->category = new category;
        $this->user = new user;
    }
    public function index()
    {
        $data['row'] = DB::table('posts')->get();
        return view(parent::loadDefaultDataToView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        $data['row'] = DB::table('categories')->get();
        return view(parent::loadDefaultDataToView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model                  = $this->model;
        $model->user_id         = auth()->user()->id;
        $model->category_id     = $request->category_id;
        $model->unique_id       = Str::uuid();
        $model->title           = $request->title;
        $model->content         = $request->content;
        $model->status          = $request->status ? true : false;
        $model->featured        = $request->featured ? true : false;
        $model->status          = $request->status;
        $model->slug            = Str::slug($request->title);
        $model->visitor         = 0;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $imageName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('public_path'('uploads'), $imageName);
        } else {
            $imageName = null;
        }
        $model->thumbnail = $imageName;
        $success = $model->save();

        if ($success) {
            $request->session()->flash('success', $this->panel . ' successfully added.');
            return redirect()->route($this->base_route);
        } else {
            return redirect()->route($this->base_route);
        }
    }

    public function edit(Request $request, $id)
    {
        $category['categories'] = DB::table('categories')->get();
        $data = [];
        $data['row'] = $this->model->findOrFail($id);
        return view(parent::loadDefaultDataToView($this->view_path . '.edit'), compact('data', 'category'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $this->model::findOrFail($id);

        $data->user_id           = auth()->user()->id;
        $data->category_id       = $request->category_id;
        $data->unique_id         = Str::uuid();
        $data->title             = $request->title;
        $data->content           = $request->content;
        $data->status            = $request->status ? true : false;
        $data->featured          = $request->featured ? true : false;
        $data->status            = $request->status;
        $data->slug              = Str::slug($request->title);
        $data->visitor           = 0;

        if ($request->hasFile('thumbnail')) {
            if ($data->thumbnail) {
                $image_path = public_path("uploads/{$data->thumbnail}");
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $thumbnail = $request->file('thumbnail');
            $imageName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads'), $imageName);
            $data->image = $imageName;
        }

        $success = $data->save();

        if ($success) {
            $request->session()->flash('update_success', $this->panel . ' successfully updated.');
            return redirect()->route($this->base_route);
        } else {
            return redirect()->route($this->base_route);
        }
    }

    public function view(Request $request, $id)
    {
        $data = [];
        $data['row'] = $this->model::findOrFail($id);
        return view(parent::loadDefaultDataToView($this->view_path . '.view'), compact('data'));
    }

    public function delete($id)
    {
        $model = $this->model;
        $data = $model::findOrFail($id);

        if ($data->thumbnail) {
            $image_path = public_path("uploads/{$data->thumbnail}");
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $success = $data->delete();

        if ($success) {
            return redirect()->route($this->base_route)->with('delete_success', $this->panel . ' successfully deleted.');
        }
    }
}
