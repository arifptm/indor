<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Flash;
use Response;
use App\Role;
use Auth;

class UserController extends Controller
{
    public function index(){        
        $super = User::whereRoleIs('super')->pluck('id');
        $users = User::where('id','<>',$super)->simplePaginate(5);
        return view('user.index', ['users'=> $users]);
    }

    public function create(){
        $roles = Role::whereNotIn('name',['super','user'])->get();
        return view('user.create', ['roles'=> $roles]);
    }

    public function store(Request $request){
        $req = $request->all();
        $req['password'] = bcrypt($request->password);        
        $u = User::create($req);
        if($request->role){
            $u -> attachRoles($request->role);    
        }
        $u->attachRole('user');
        flash('User created successfully.')->success();
        return redirect('/manage/users');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('user.show', ['user'=>$user]);
    }

    public function edit($id){
        $u = User::with('roles')->findOrFail($id);
        $user_roles = array();
        foreach ($u->roles as $role) {
            $user_roles[] = $role->name;
        }
        $roles = Role::whereNotIn('name',['user','super'])->get();
        return view('user.edit', ['user'=>$u, 'roles'=> $roles, 'user_roles'=>$user_roles]);
    }


    public function update(Request $request, $id){
        $user = User::findOrFail($id);  
        $user->detachRoles($user->roles->pluck('name')->toArray());        
        if ($request->role){
            $user->attachRoles($request->role);
        }
        $user->attachRole('user');
        $req = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if ( ! $request->password == ''){
            $req['password'] = bcrypt($request->password);
        }    

        $user -> update($req);
        
        flash('User update successfully.')->success();
        return redirect('/manage/users');
    }


    public function destroy($id){
        $user = User::FindOrFail($id);
        $user -> delete($id);
        flash('User deleted successfully.')->success();
        return redirect('/manage/users');
    }







    public function profile(){
        $user = User::findOrFail(Auth::user()->id);
        return view('user.profile', ['user'=>$user]);
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        $request['id'] = $user->id;  
        $request['role'] = $user->roles->pluck('name')->toArray();
        

        if ( $request->password != ''){
            $request['password'] = bcrypt($request->password);
        }    
        
        $user -> update($request->all());
        
        flash('User update successfully.')->success();
        return redirect('/profile');
    }



    public function upload(Request $request){
        
            if($request->file('image')->isValid()) {
                try {
                    $file = $request->file('image');
                    $name = time() . '.' . $file->guessClientExtension();
                    $request->file('image')->move("upload/image/", $name);
                    return $name;

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
    }
}
