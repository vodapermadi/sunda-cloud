<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

use function PHPSTORM_META\map;

class AdminController extends Controller
{
    public function index():View
    {
        $users = User::all()->where('level','!=','admin')->count();
        $products = Product::all()->count();
        $categories = Category::all()->count();
        return view('admin.dashboard',compact('users','products','categories'));
    }

    public function viewUser():View
    {
        $users = User::all();
        return view('admin.user',compact('users'));
    }

    public function editUser($id):View
    {
        $user = User::all()->findOrFail($id);
        return view('admin.userEdit',compact('user'));
    }

    public function updateUser(Request $request,$id):RedirectResponse
    {
        User::all()->findOrFail($id)->update($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($id),
            ],
            'level' => 'required'
        ]));
        return redirect()->route('admin.user')->with('success','Update User Success');
    }

    public function destroyUser($id):RedirectResponse
    {
        User::all()->findOrFail($id)->delete();
        return redirect()->route('admin.user');
    }
}
