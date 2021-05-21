<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->perPage !== null ? $request->perPage : env('NUM_PER_PAGE') ;
        $role = $request->role;
        $result = User::where('name', 'like', "%{$search}%")
            ->when($role, function ($query, $role){
                return $query->where('role', $role);
            })
            ->paginate($perPage);

        return view('admin.user.index', [
            'users' => $result,
            'search' => $search,
            'perPage' => $perPage,
            'role' => $role,
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'email|required|max:255|unique:users',
            'gender' => 'required|max:2|',
            'birthday' => 'required',
            'address' => 'required|max:255|string',
            'phone' => 'required|max:255|string',
            'password' => 'required|max:255|string',
            'password_confirm' => 'required|same:password',
        ]);
        $target = new User;
        $target->name = $request->name;
        $target->email = $request->email;
        $target->address = $request->address;
        $target->phone = $request->phone;
        $target->gender = $request->gender;
        $target->birthday = $request->birthday;
        $target->role = $request->role !== null ? $request->role : 1;
        $target->password = Hash::make($request->password);
        if ($request->image !== null) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $target->image = $newImageName;
        }
        $target->save();

        return redirect()->route('users.index')->with('success', 'Created User Successfully');

    }

    public function show($id)
    {
        $result = User::find($id);
        if (!$result) {
            return view('admin.user.index')->with('error', 'Cannot Found!');
        } else {
            return view('admin.user.show', ['user' => $result]);
        }
    }

    public function edit($id)
    {
        $result = User::find($id);
        return view('admin.user.edit', [
            'user' => $result,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
        ]);
        $target = User::find($id);
        $target->name = $request->name;
        $target->address = $request->address;
        $target->phone = $request->phone;
        $target->gender = $request->gender;
        $target->birthday = $request->birthday;
        $target->role = $request->role !== null ? $request->role : 1;
        if ($request->image !== null) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $target->image = $newImageName;
        }
        $target->save();

        return redirect()->route('users.index')->with('success', 'Updated User Successfully');
    }

    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('users.index')->with('error', 'The logged In User Cannot Ce Deleted!');
        } else {
            $target = User::find($id);
            if (!$target) {
                return redirect()->route('users.index')->with('error', 'Cannot Found User!');
            }
            $target->delete();
            return redirect()->route('users.index')->with('success', 'Delete User Success!');
        }
    }
}
