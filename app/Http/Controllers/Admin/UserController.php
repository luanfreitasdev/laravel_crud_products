<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->setBreadcumb([
            'icon' => 'settings',
            'label' => 'Configurações']);

        $this->setBreadcumb([
            'link' => route('admin.users.index'),
            'icon' => 'person',
            'active' => true,
            'label' => 'Usuários']);

        $users = User::all();
        return view('admin.users.home')->with('users', $users);
    }

    public function edit(User $user)
    {
        $this->setBreadcumb([
            'icon' => 'settings',
            'label' => 'Configurações']);

        $this->setBreadcumb([
            'link' => route('admin.users.index'),
            'icon' => 'person',
            'active' => false,
            'label' => 'Usuários']);

        $this->setBreadcumb([
            'link' => route('admin.users.edit', $user->id),
            'active' => true,
            'icon' => 'edit',
            'label' => ' ' .$user->name]);

        if (Auth::user()->can('resource', 'manage.users')) {
            $roles = Role::all();
            return view('admin.users.edit')->with(['user' => $user, 'roles' => $roles]);
        } else {
            return $this->denies();
        }

    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->name       = $request->name;

        if ($user->save()) {
            $request->session()->flash('success', $request->name. ' foi atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'Falha ao atualizar o usuário');
        }

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
