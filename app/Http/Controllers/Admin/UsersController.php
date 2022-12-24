<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {

        $users = User::query()->paginate(5);

        return view('users.index')->with('users', $users);

    }

    public function updateUsers(){
        $users = User::query()->where('id', '!=', Auth::id())->paginate(5);


        return view('admin.users.index', ['users'=>$users]);
    }

    public function toggleAdmin(User $user){
        if($user->id != Auth::id()){
            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect()->route('admin.updateUsers')->with('success', 'Права изменены');
        }else{
            return redirect()->route('admin.updateUsers')->with('error', 'Права измененить нельзя ');
        }

    }


}




