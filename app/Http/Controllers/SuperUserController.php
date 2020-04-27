<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Illuminate\Support\Facades\Gate;

class SuperUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('supervisor')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index(Request $request)
    {
        $filter = $request->get('filter');
        $search = $request->get('search');

        if ($filter && $search) {
            $users = User::where('name', 'LIKE', "%$search%")->where('role', 'LIKE', $filter)->paginate(10);
        } elseif ($search) {
            $users = User::where('name', 'LIKE', "%$search%")->paginate(10);
        } elseif ($filter) {
            $users = User::where('role', 'LIKE', $filter)->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('super.user.index', ['users' => $users]);
    }

    public function create()
    {
        return view("super.user.create");
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'name' => 'required|min:5|max:100',
            'email' => 'required|email|unique:users',
            'username' => 'required|min:5|max:50|unique:users',
            'role' => 'required',
            'password' => 'required|min:8|max:50',
            'password_confirmation' => 'required|same:password'
        ])->validate();

        $new_user =  new User;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->username = $request->get('username');
        $new_user->role = $request->get('role');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->save();

        return redirect()->route('user.create')->with('status', 'User successfully created');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('super.user.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('super.user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'name' => 'required|min:5|max:100',
            // 'email' => 'required|email|unique:users',
            'username' => 'required|min:5|max:50|unique:users',
            'role' => 'required',
            'password' => 'required|min:8|max:50',
            'password_confirmation' => 'required|same:password'
        ])->validate();

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->username = $request->get('username');
        // $user->email = $request->get('email');
        $user->role = $request->get('role');

        if ($request->get('password')) {
            $user->password = \Hash::make($request->get('password'));
        }

        $user->save();

        return redirect()->route('user.edit', ['id' => $id])->with('status', $user->name);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->name != 'root') {
            $user->delete();
            return redirect()->route('user.index')->with('status', 'User successfully deleted');
        }

        return redirect()->route('user.index')->with('status', "Sorry can't delete root");
    }
}
