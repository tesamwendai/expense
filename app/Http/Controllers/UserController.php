<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    // make function return view user
    public function index()
    {
        return view('user-manager.index');
    }
    //make function get data user   
    public function getUser()
    {
        $user = User::select(['id', 'name', 'email','status', 'created_at', 'updated_at']);
        return DataTables::of($user)
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('d/m/Y');
            })
            ->editColumn('status', function ($user) {
                if ($user->status == 1) {
                    return '<span class="badge badge-success">Đang hoạt động</span>';
                } else {
                    return '<span class="badge badge-danger">Bị khóa</span>';
                }
            })
            ->addColumn('action', function ($user) {
                return '<a href="#" class="btn btn-xs btn-primary edit" id="' . $user->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger delete" id="' . $user->id . '"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->setRowClass(function ($user) {
                return $user->status == 0 ? 'bg-light-danger' : 'bg-light-success';
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }
    public function role()
    {
        return view('user-manager.role');
    }
}
