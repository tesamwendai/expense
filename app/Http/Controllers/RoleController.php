<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Cache;

class RoleController extends Controller
{
    // make function return view role
    public function index()
    {
        $permissions=[];;
        if (Cache::has('permissions')) {
            // Key exists
            $permissions = Cache::get('permissions');
        }else{
            $permissions=Permission::query()->latest()->get();
            Cache::put('permission', '$per',(5));
            Cache::put('name', "Thái",5);
        }
    
        return view('role-manager.index',compact('permissions'));
    }
    //make function get data role   
    public function getRole()
    {
        $role = Role::all();
        return DataTables::of($role)
            ->editColumn('created_at', function ($role) {
                return $role->created_at->format('d/m/Y');
            })
            ->addColumn('action', function ($role) {
                return '<a href="#"  onclick="openModalEditRole('.$role->id.')" class="btn btn-xs btn-primary edit-'.$role->id.'" id="' . $role->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a href="#" onclick="deleteRole('.$role->id.')" class="btn btn-xs btn-danger delete-'.$role->id.'" id="' . $role->id . '"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    // make function getRoleById
    public function getRoleById(Request $request)
    {
        $role = \Spatie\Permission\Models\Role::find($request->id);
        $role->permissions=$role->permissions->pluck('name');
        return response()->success($role,"Lấy dữ liệu role<".$request->id."> thành công! 😌");
    }
    // make functio insert role
    public function insertRole(Request $request)
    {
        // create role
        // dd($request->all());
        try
        {
            $role = \Spatie\Permission\Models\Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permission);
            return response()->success($role->id,"Thêm mới vai trò thành công! 😌");
        }
        catch(\Exception $e)
        {
            return response()->error($e->getMessage());
        }
        // Role::create(['name' => $request->name]);
        return response()->error("Thêm mới vai trò thất bại 🥹");
    }
    // make function update role
    public function updateRole(Request $request)
    {
        try
        {
            $role = \Spatie\Permission\Models\Role::find($request->id);
            $role->name = $request->name;
            $role->guard_name="web";
            $role->syncPermissions($request->permissions);
            $role->save();

            return response()->success($role->id,"Cập nhật vai trò thành công! 😌");
        }
        catch(\Exception $e)
        {
            return response()->error($e->getMessage());
        }
        return response()->error('Cập nhật vai trò thất bại! 😌');
    }
    // make function delete role
    public function deleteRole(Request $request)
    {
        try
        {
            $role = Role::find($request->id);
            $role->delete();
            return response()->success($role->id,"Xóa vai trò thành công! 😌");
        }
        catch(\Exception $e)
        {
            return response()->error($e->getMessage());
        }
        return response()->error('Xóa vai trò thất bại 🥹');
    }
}
