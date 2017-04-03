<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserCtrl extends Controller
{
    public function index()
    {
    	$users = User::get();
    	return view('manage.users.index', ['users' => $users]);
    }

    public function postAddUser(Request $request)
    {
        $rules = [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            
            User::create([
				'name'     => $request->name,
                'email'    => $request->email,
				'password' => bcrypt($request->password),
            ]);

            return redirect('admin/users');
        }
    }

    public function postEditUser(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

    	$validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            User::where('id', $request->user_id)->update([
                'name'     => $request->name,
            ]);
            
            if (!empty($request->password)) {
                User::where('id', $request->user_id)->update([
                    'password' => bcrypt($request->password),
                ]); 
            } 
            
            return redirect('admin/users');
        }
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();

    	return redirect('admin/users');
    }
}
