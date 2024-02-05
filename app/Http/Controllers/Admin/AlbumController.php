<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends BaseController
{
    protected $base_route = "admin.album.index";
    protected $view_path = "admin.album";
    protected $panel = "Album";
    protected $model;
    public function __construct()
    {
        $this->model = new Album;
    }

    public function index()
    {
        $data['row'] = Album::with(['gallery'])->get();
        return view(parent::loadDefaultDataToView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['row'] = $this->model->getGallery();
        return view(parent::loadDefaultDataToView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model = $this->model;
        $model->gallery_id = $request->gallery_id;

        $uploadedImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/albums'), $imageName);
                $uploadedImages[] = '/uploads/albums/' . $imageName;
            }

            $model->images = $uploadedImages;
        }
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
        $data['galleries'] = $this->model->getGallery();
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
        $data->gallery_id = $request->gallery_id;

        if ($request->has('images_remove')) {
            foreach ($request->input('images_remove') as $imageRemove) {
                $imageRemove = public_path($imageRemove);
                if (file_exists($imageRemove)) {
                    unlink($imageRemove);
                }
            }
        }

        $oldImagePaths = is_array($data->images) ? $data->images : explode(',', $data->images);

        foreach ($oldImagePaths as $oldImagePath) {
            $oldImagePath = public_path($oldImagePath);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/albums'), $imageName);
                $imagePaths[] = '/uploads/albums/' . $imageName;
            }
        }

        $data->images = $imagePaths;

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
        $data['row'] = Album::with(['gallery'])->findOrFail($id);

        return view(parent::loadDefaultDataToView($this->view_path . '.view'), compact('data'));
    }
    public function delete(Request $request, $id)
    {
        $model = $this->model;
        $data = $model->findOrFail($id);

        $imagePaths = $data->images;

        foreach ($imagePaths as $imagePath) {
            $imageFullPath = public_path($imagePath);
            if (file_exists($imageFullPath)) {
                unlink($imageFullPath);
            }
        }

        $success = $data->delete();

        if ($success) {
            $request->session()->flash('delete_success', $this->panel . ' successfully deleted.');
            return redirect()->route($this->base_route);
        } else {
            return redirect()->route($this->base_route)->withErrors('Failed to delete data.');
        }
    }
}
