<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends BaseController
{
    protected $base_route = 'admin.video.index';
    protected $view_path = 'admin.video';
    protected $panel = 'Video';
    protected $model;

    public function __construct()
    {
        $this->model = new Video;
    }

    public function index()
    {
        $data['row'] = DB::table('videos')->get();
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

        $model                  = $this->model;
        $model->title           = $request->title;
        $model->url             = $request->url;
        $model->video_id        = $this->model->getYoutubeIdFromUrl($request->url);
        $model->status          = $request->status ? true : false;
        $model->featured        = $request->featured ? true : false;

        $success = $model->save();

        if ($success) {
            $request->session()->flash('success', $this->panel . ' successfully added.');
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

        $data->title            = $request->title;
        $data->url              = $request->url;
        $data->video_id         = $this->model->getYoutubeIdFromUrl($request->url);
        $data->status           = $request->status ? true : false;
        $data->featured         = $request->featured ? true : false;

        $success = $data->save();

        if ($success) {
            $request->session()->flash('update_success', $this->panel . ' successfully updated.');
            return redirect()->route($this->base_route);
        } else {
            return redirect()->route($this->base_route);
        }
    }

    public function delete($id)
    {
        $model = $this->model;
        $data = $model::findOrFail($id);
        $success = $data->delete();

        if ($success) {
            return redirect()->route($this->base_route)->with('delete_success', $this->panel . ' deleted successfully.');
        }
    }
}
