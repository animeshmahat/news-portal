<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new User;
    }

    public function index()
    {
        $data['row'] = DB::table('users')->get();
        return view('admin.users.index', compact('data'));
    }
}
