<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Flash;
use Response;
use App\Role;

class UserController extends Controller
{
    public function index(){        
        $super = User::whereRoleIs('super')->pluck('id');
        $users = User::where('id','<>',$super)->simplePaginate(5);
        return view('user.index', ['users'=> $users]);
    }

    public function create(){
        $roles = Role::where('name','<>','super')->get();
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
        foreach ($u->roles as $role) {
            $user_roles[] = $role->name;
        }
        
        $roles = Role::where('name','<>','super')->get();
        return view('user.edit', ['user'=>$u, 'roles'=> $roles, 'user_roles'=>$user_roles]);
    }


    public function update(Request $request, $id){
        
        $user = User::findOrFail($id);  
        $user->attachRoles($request->role);
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
