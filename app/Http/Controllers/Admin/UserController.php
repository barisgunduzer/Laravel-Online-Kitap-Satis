<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public static function usercount()
    {
        $users = User::all();
        return $users->count();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = User::all();
        return view('admin.user',['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        $datalist = Role::all()->sortBy('name');
        return view('admin.user_show',['data' => $data, 'datalist' => $datalist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user_edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        if($request->file('image') != NULL){
            $data->profile_photo_path = Storage::putFile('profile-photos',$request->file('image'));
        }
        $data->save();
        return redirect()->route('admin_users')->with('success','User Information Updated');
    }

    public function user_roles($id){
        $data = User::find($id);
        $datalist = Role::all()->sortBy('name');
        return view('admin.user_roles',['data'=>$data, 'datalist' => $datalist]);
    }

    public function user_role_store(Request $request, $id){
        $user = User::find($id);
        $roleid = $request->input('roleid');
        $user->roles()->attach($roleid); #Many to Many ilişkisine veri ekler
        return redirect()->back()->with('success','Role added to user');
    }

    public function user_role_delete($userid, $roleid){
        $user =User::find($userid);
        $user->roles()->detach($roleid); #Many to Many ilişkisinden verilen yolu siler
        return redirect()->back()->with('success','Role deleted from user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
