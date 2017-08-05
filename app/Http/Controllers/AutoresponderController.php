<?php

namespace App\Http\Controllers;

use App\Autoresponder;
use Illuminate\Http\Request;
use Auth;

class AutoresponderController extends Controller
{
    public function index(){
        $a = Autoresponder::paginate(20);
        return view('autoresponder.index', ['autoresponders' =>$a]);
    }

    public function create(){
        return view('autoresponder.create');
    }


    public function store(Request $request){
        $request = $request->all();
        $request['user_id'] = Auth::user()->id;
        //$request['token'] = 
        //send activation
        Autoresponder::create($request);

        flash('Autoresponder berhasil ditambah.')->success();
        return redirect('/autoresponders');
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
