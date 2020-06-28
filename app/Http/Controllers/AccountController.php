<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function accountform() {
        $admin = auth()->user();
        return view('admin.pages.account.accountform', compact('admin'));

    }

    public function accountupdate(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);
        $admin = User::find($id);
        $updatedadmin = $admin->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' =>  bcrypt($request['password'])
        ]);
        if ($updatedadmin) {

            return redirect()->back()->with('success', 'Account updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update');
        }

    }
}
