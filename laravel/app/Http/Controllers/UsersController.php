<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class UsersController extends Controller
{
    public function index() {
        $users = User::with('company')->get();

        return view('users.index', ['users' => $users]);
    }

    public function create() {
        $companies =  Company::all();
        return view('users.create', compact('companies'));
    }

    public function store(Request $request) {
        //dd($request);

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'min:9|unique:users',
            'email' => 'email|unique:users',
            'company_id' => 'numeric|exists:companies,id',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);

        $newUser = User::create($data);

        return redirect(route('users.index'));
    }

    public function edit(User $user) {
        $companies = Company::all();
        return view('users.edit', ['user'=>$user, 'companies'=>$companies]);
    }

    public function update(User $user, Request $request) {

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'min:9',
            'email' => 'email',
            'company_id' => 'numeric|exists:companies,id'
        ]);
        //dd($data);
        $data['company_id'] = $request->company_id;

        $user->update($data);

        return redirect(route('users.index'))->with('success', 'User updated successfully!');
    }

    public function delete(User $user) {
        $user->delete();
        return redirect(route('users.index'))->with('success', 'User deleted successfully!');
    }

    public function getAll() {
        $users = User::with('company')->get();

        return response()->json($users);

    }
}
