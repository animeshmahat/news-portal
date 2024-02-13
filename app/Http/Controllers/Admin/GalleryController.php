<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends BaseController
{
    protected $base_route = "admin.gallery.index";
    protected $view_path = "admin.gallery";
    protected $panel = "Gallery";
    protected $model;
    public function __construct()
    {
        $this->model = new Gallery;
    }

    public function index()
    {
        $data['row'] = DB::table('galleries')->get();
        return view(parent::loadDefaultDataToView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        return view(parent::loadDefaultDataToView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model                 = $this->model;
        $model->name           = $request->name;
        $model->status         = $request->status ? true : false;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $imageName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('public_path'('uploads/gallery'), $imageName);
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

    public function edit($id)
    {
        $data = [];
        $data['row'] = $this->model->findOrFail($id);
        return view(parent::loadDefaultDataToView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $this->model->findOrFail($id);

        $data->name = $request->name;
        $data->status = $request->status ? true : false;

        if ($request->hasFile('thumbnail')) {
            if ($data->thumbnail) {
                $image_path = public_path("uploads/gallery/{$data->thumbnail}");
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $thumbnail = $request->file('thumbnail');
            $imageName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/gallery'), $imageName);
            $data->thumbnail = $imageName;
        }

        $success = $data->save();

        if ($success) {
            $request->session()->flash('update_success', $this->panel . ' successfully updated.');
            return redirect()->route($this->base_route);
        } else {
            return redirect()->route($this->base_route)->withErrors('Failed to update data.');
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
        $data = $model->findOrFail($id);

        $model->deleteImage($data->thumbnail);

        $success = $data->delete();

        if ($success) {
            return redirect()->route($this->base_route)->with('delete_success', $this->panel . ' successfully deleted.');
        }
    }
}
