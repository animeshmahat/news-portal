<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new category;
    }
    public function index()
    {
        $data = DB::table('categories')->get();
        return view('admin.category.index', compact('data'));
    }

    public function create_category()
    {
        return view('admin.category.create');
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
            return redirect()->route('category.index')->with('success', 'New information added successfully.');
        } else {
            return view('category.index');
        }
    }

    public function edit_category($id)
    {
        $data = $this->model->findorFail($id);
        return view('admin.category.edit', compact('data'));
    }

    public function update_category(Request $request, $id)
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
            return redirect()->route('category.index')->with('update_success', 'Information updated successfully');
        } else {
            return view('category.index');
        }
    }

    public function view_category(Request $request, $id)
    {
        $data = $this->model::findorFail($id);
        return view('admin.category.view', compact('data'));
    }

    public function delete_category(Request $request, $id)
    {
        $model = $this->model;
        $data = $model::findorFail($id);
        $success = $data->delete();

        if ($success) {
            return redirect()->route('category.index')->with('delete_success', 'Information deleted successfully.');
        }
    }
}
