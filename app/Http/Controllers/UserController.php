<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('user.index')->with('success','Data Berhasil Dihapus');
    }
    protected function register()
    {
        return view('users.createUsers');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string','max:255'],
            'email' => ['required', 'string','email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $data = $request->all();
        $check = $this->valid($data);

        return redirect('user.index')->with('success','Data Berhasil Ditambah');
    }

    protected function valid (array $data)
    {
        return User::create([
            'name' => ucwords(trim($data['name'])),
            'email' => trim($data['email']),
            'password' => Hash::make($data['password'])
        ]);
    }
}
