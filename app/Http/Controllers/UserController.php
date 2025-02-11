<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
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
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();

        return redirect('user.index')->with('success','Data Berhasil Dihapus'.$user->id);
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
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
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);
    }
    protected function edit($id)
    {
        $edit = User::find($id);
        return view('users.edit', compact('edit'));
    }
    protected function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string','max:255'],
            'email' => ['required', 'string','email'],
            'role' => ['required']
        ]);

        $user = User::find($id);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect('user.index')->with('success','Data Berhasil Diubah');
    }
    public function passwordEdit(request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],

        ], [
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak sesuai',
            'password_confirmation.required' => 'Password wajib diisi',
            'password_confirmation.min' => 'Password minimal 8 karakter',
        ]);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('user.index')->with('success','Password Berhasil Diubah');;
    }
}
