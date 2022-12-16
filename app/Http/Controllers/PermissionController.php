<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use DataTables;
class PermissionController extends Controller
{
    public function index()
    {
        return view('permission-manager.index');
    }
    //make function get data permission   
    public function getPermission()
    {
        $permission = Permission::all();
        return DataTables::of($permission)
            ->editColumn('created_at', function ($permission) {
                return $permission->created_at->format('d/m/Y');
            })
            ->addColumn('action', function ($permission) {
                return '<a href="#"  onclick="openModalEditPermission('.$permission->id.')" class="btn btn-xs btn-primary edit-'.$permission->id.'" id="' . $permission->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a href="#" onclick="deletePermission('.$permission->id.')" class="btn btn-xs btn-danger delete-'.$permission->id.'" id="' . $permission->id . '"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    // make function getPermissionById
    public function getPermissionById(Request $request)
    {
        $permission = Permission::find($request->id);
        return response()->success($permission,"Lấy dữ liệu permission<".$request->id."> thành công! 😌");
    }
    // make functio insert permission
    public function insertPermission(Request $request)
    {
        // create permission
        try
        {
            $permission = Permission::create(['name' => $request->name]);
            return response()->success($permission->id,"Thêm mới quyền thành công! 😌");
        }
        catch(\Exception $e)
        {
            return response()->error($e->getMessage());
        }
        // Permission::create(['name' => $request->name]);
        return response()->error("Thêm mới quyền thất bại 🥹");
    }
    // make function update permission
    public function updatePermission(Request $request)
    {
        try
        {
            $permission = Permission::find($request->id);
            $permission->name = $request->name;
            $permission->guard_name="web";
            $permission->save();
            return response()->success($permission->id,"Cập nhật quyền thành công! 😌");
        }
        catch(\Exception $e)
        {
            return response()->error($e->getMessage());
        }
        return response()->error('Cập nhật quyền thất bại! 😌');
    }
    // make function delete permission
    public function deletePermission(Request $request)
    {
        try
        {
            $permission = Permission::find($request->id);
            $permission->delete();
            return response()->success($permission->id,"Xóa quyền thành công! 😌");
        }
        catch(\Exception $e)
        {
            return response()->error($e->getMessage());
        }
        return response()->error('Xóa quyền thất bại 🥹');
    }
}
