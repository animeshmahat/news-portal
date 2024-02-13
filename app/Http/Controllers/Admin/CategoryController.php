<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends BaseController
{
    protected $base_route = 'admin.category.index';
    protected $view_path = 'admin.category';
    protected $panel = 'Category';
    protected $model;

    public function __construct()
    {
        $this->model = new category;
    }
    public function index()
    {
        $data['row'] = DB::table('categories')->get();
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

        $model                   = $this->model;
        $model->title            = $request->title;
        $model->description      = $request->description;
        $model->status           = $request->status ? true : false;

        $success                 = $model->save();


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
        $data['row'] = $this->model->findorFail($id);
        return view(parent::loadDefaultDataToView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $this->model::findorFail($id);

        $data->title           = $request->title;
        $data->description     = $request->description;
        $data->status          = $request->status ? true : false;

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
        $data['row'] = $this->model::findorFail($id);
        return view(parent::loadDefaultDataToView($this->view_path . '.view'), compact('data'));
    }

    public function delete($id)
    {
        $model = $this->model;
        $data = $model::findorFail($id);
        $success = $data->delete();

        if ($success) {
            return redirect()->route($this->base_route)->with('delete_success', $this->panel . ' successfully deleted.');
        }
    }
}
