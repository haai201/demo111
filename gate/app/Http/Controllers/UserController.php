<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UserAddRequest;
use DB;
use Hash;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }
    public function index(){
        $listUser = $this->user->latest()->paginate(5);
       return view('user.index',compact('listUser'));
    }
    public function create(){
        $roles = $this->role->all();
        return view('user.add',compact('roles'));
    }
    public function store(UserAddRequest $request){
        try { 
            DB::beginTransaction();
            $userCreate = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);
        //thêm data vào role_user
        $userCreate->roles()->attach($request->roles);
        // $roles= $request ->roles;
        // foreach ($roles as $roleId){
        //     \DB::table('role_user')->insert([
        //         'user_id'=> $userCreate->id,
        //         'role_id'=>$roleId
        //     ]);
        // }
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
        //thêm data vào table
       
    }
    public function edit($id){
        $roles = $this->role->all();
        $user = $this->user->findOrfail($id);
        $listRoleOfUser = DB::table('role_user')->where('user_id',$id)->pluck('role_id');
        return view('user.edit', compact('roles','user','listRoleOfUser'));
        // return view('user.edit');
    }
    public function update(Request $request,  $id){
            //update user table
            try { 
                DB::beginTransaction();
            $this->user->where('id',$id)->update([
                'name'->$request->name,
                'email'->$request->email
            ]);
            //update role_user table
            DB::table('role_user')->where('user_id',$id)->delete();
            $userCreate= $this->user ->find($id);
            $userCreate->roles()->attach($request->roles);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
    public function delete(){
        dd('Đây là trang xóa');
        // return view('user.delete');
    }
}
