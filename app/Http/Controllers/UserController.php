<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Flash;
use Response;
use App\Role;
use Auth;
use App\Profile;
use App\Http\Requests\UserCreate;

class UserController extends Controller
{
    public function index(){        
        $super = User::whereRoleIs('super')->pluck('id');
        $users = User::where('id','<>',$super)->simplePaginate(25);
        return view('user.index', ['users'=> $users]);
    }

    public function create(){
        $roles = Role::whereNotIn('name',['super','user'])->get();
        return view('user.create', ['roles'=> $roles]);
    }

    public function store(UserCreate $request){
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
        $req['id'] = $user->id;  
        $req['role'] = $user->roles->pluck('name')->toArray();        
        if ( $request->password != ''){
            $req['password'] = bcrypt($request->password);
        } else {
            $req['password'] = $user->password;
        }    
        $req['name'] = $request->name;
        $req['email'] = $request->email;
        
        $user -> update($req);
        
        if ($request->hasFile('image')) {
            $user_img = Profile::firstOrCreate(['user_id'=>$user->id]);
            $profile['image'] = $this->upload($request);
            $profile['user_id'] = $user_img->user_id;
            $user_img->update($profile);
        }
        
        flash('User update successfully.')->success();
        return redirect('/profile');
    }



    public function upload(Request $request){
        
            if($request->file('image')->isValid()) {
                try {
                    $file = $request->file('image');
                    $name = time() . '.' . $file->guessClientExtension();
                    $request->file('image')->move("assets/profiles/", $name);
                    return $name;

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
    }
}
