<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){
        $p = Package::paginate(20);
        return view('manage.package.index', ['packages' =>$p]);
    }

    public function create(){
        return view('manage.package.create');
    }


    public function store(Request $request){
        
        $request['can_single_optin'] =  $request->can_single_optin ? '1' : '0';
        $request['show_ads'] = $request->show_ads ? '1' : '0';
        $request['can_import'] =$request->can_import ? '1' :  '0';
        $request['can_broadcast'] =$request->can_broadcast ? '1' :  '0';
        $request['can_reminder'] =$request->can_reminder ? '1' : '0';
        $request['can_copy_message'] =$request->can_copy_message ? '1' :  '0';
        Package::create($request->all());
        flash('Package created successfully.')->success();
        return redirect('/manage/packages');
    }

    public function show(Package $package){
        //
    }

    public function edit(Package $package){        
        return view('manage.package.edit', ['package'=>$package]);
    }


    public function update(Request $request, Package $package){
        $p = Package::findOrFail($package->id);
        $request['can_single_optin'] =  $request->can_single_optin ? '1' : '0';
        $request['show_ads'] = $request->show_ads ? '1' : '0';
        $request['can_import'] =$request->can_import ? '1' :  '0';
        $request['can_broadcast'] =$request->can_broadcast ? '1' :  '0';
        $request['can_reminder'] =$request->can_reminder ? '1' : '0';
        $request['can_copy_message'] =$request->can_copy_message ? '1' :  '0';
        $p->update($request->all());
        
        flash('Package updated successfully.')->success();
        return redirect('/manage/packages');
    }
    public function destroy(Package $package){
        $p = Package::findOrFail($package->id);
        $p -> delete();        
        flash('Package deleted successfully.')->success();
        return redirect('/manage/packages');        
    }
}
