<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends BaseController
{
    protected $base_route = "admin.post.index";
    protected $view_path = "admin.post";
    protected $panel = "Post";
    protected $model;
    public function __construct()
    {
        $this->model = new Post;
    }
    public function index()
    {
        $data['row'] = Post::with(['user', 'category'])->get();
        return view(parent::loadDefaultDataToView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['row'] = $this->model->getCategory();
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
        $model->slug            = Str::slug($request->title);
        $model->url             = $request->url;
        $model->visitor         = 0;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $imageName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('public_path'('uploads/post'), $imageName);
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
        $data = [];
        $data['category'] = $this->model->getCategory();
        $data['row'] = $this->model->findOrFail($id);
        return view(parent::loadDefaultDataToView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data                    = $this->model::findOrFail($id);
        $data->user_id           = auth()->user()->id;
        $data->category_id       = $request->category_id;
        $data->unique_id         = Str::uuid();
        $data->title             = $request->title;
        $data->content           = $request->content;
        $data->status            = $request->status ? true : false;
        $data->featured          = $request->featured ? true : false;
        $data->slug              = Str::slug($request->title);
        $data->url               = $request->url;
        $data->visitor           = 0;

        if ($request->hasFile('thumbnail')) {
            if ($data->thumbnail) {
                $image_path = public_path("uploads/post/{$data->thumbnail}");
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $thumbnail = $request->file('thumbnail');
            $imageName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/post'), $imageName);
            $data->thumbnail = $imageName;
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

        // works but more lines of code
        // $data['user'] = $this->model->getUser();
        // $data['category'] = $this->model->getCategory();
        // $data['row'] = $this->model::findOrFail($id);

        $data['row'] = Post::with(['user', 'category'])->get();
        $data['row'] = $this->model::findOrFail($id);
        return view(parent::loadDefaultDataToView($this->view_path . '.view'), compact('data'));
    }
    public function delete($id)
    {
        $model = $this->model;
        $data = $model::findOrFail($id);

        if ($data->thumbnail) {
            $image_path = public_path("uploads/post/{$data->thumbnail}");
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        $success = $data->delete();

        if ($success) {
            return redirect()->route($this->base_route)->with('delete_success', $this->panel . ' successfully deleted.');
        }
    }
    public function updateStatus(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return response()->json(['message' => 'Status Changed']);
    }
    public function updateFeatured(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->featured = $request->featured;
        $data->save();

        return response()->json(['message' => 'Featured Changed']);
    }
}
