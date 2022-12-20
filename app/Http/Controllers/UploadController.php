<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    public function processAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = uniqid() . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension();
            $folder = 'avatars';
            $file->storeAs('public/images/'.$folder, $filename);
            TemporaryFile::create([
                'folder'=>$folder,
                'file_name'=>$filename
            ]);
            return response()->success(json_encode(array("temp_path"=>'public/images/'.$folder.'/'.$filename)),"Upload ảnh đại diện thành công!");
        }
        return response()->error('Không tìm thấy file ảnh đại diện!');
    }
    public function revertAvatar(Request $request)
    {
        $files =   Storage::allFiles('public/images/avatars/');
        Storage::delete($files);
        TemporaryFile::query()->truncate();
        return response()->success('Xóa bộ nhớ tạm thành công!');
    }
}
