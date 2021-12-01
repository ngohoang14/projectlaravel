<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\adminModels\Information;

class InformationController extends Controller
{
    //
    public function index(){
        $infors = Information::all();
        return view('admin/contactView', ['infors'=>$infors]);
    }
    public function edit(){
        $records = Information::all();
        return view('admin/contactFormView', ['records'=>$records]);
    }
    public function editPost(Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $logo = $request->file('logo');
        $getImage = time().'_'.$logo->getClientOriginalName();
        $destinationPath = public_path('assets\upload\img');
        $logo->move($destinationPath, $getImage);
        $infor = Information::find(1);
        $infor->name = $name;
        $infor->phone = $phone;
        $infor->email = $email;
        $infor->logo = $getImage;
        $infor->save();
        return redirect(Route('admin.information.index'));
    }
    public function delete(){
        $infors = Information::all();
        return view('admin/contactView', ['infors'=>$infors]);
    }
}
