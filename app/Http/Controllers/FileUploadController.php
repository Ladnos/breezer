<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class fileuploadcontroller extends Controller
{
    public function fileUpload(Request $request)
    {
        $request->validate([
            'file.*'=>['file'],
            'telephone'=>['regex:/^(\+7|8)[0-9]{10}$/','required']
        ]);
        $user = $request->user();
        $user->about = $request->about;
        $user->telephone = $request->telephone;
        $fileNames = [];
        if ($user->files) {
            $ExisitingFiles = explode('!!',$user->files);
            if ($request->file('file')) {
                foreach ($request->file('file') as $file) {
                    $file->storeAs($request->user()->id,$file->getClientOriginalName());
                    if(!in_array($file->getClientOriginalName(),$ExisitingFiles)){
                        array_push($fileNames,$file->getClientOriginalName());
                    }
                }
                $user->files = implode('!!',array_merge($ExisitingFiles,$fileNames));
            }
        }
        // ывывывывыв
        else{
            if ($request->file('file')) {
                foreach ($request->file('file') as $file) {
                    $file->storeAs($request->user()->id,$file->getClientOriginalName());
                    array_push($fileNames,$file->getClientOriginalName());
                }
                $user->files = implode('!!',$fileNames);
            }
        }

        $user->save();
        return Redirect::route('file.upload')->with('status','файл успешно загружен, данные обновленнны');
    }
}
