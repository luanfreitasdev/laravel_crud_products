<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Resource;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $this->setBreadcumb([
            'icon' => 'settings',
            'label' => 'Configurações']);

        $this->setBreadcumb([
            'link' => route('admin.roles.index'),
            'icon' => 'person',
            'active' => true,
            'label' => 'Perfis']);

        return view('admin.roles.create');
    }

    public function store (Request $request) {
        $role             = new Role();
        $role->name       = $request->name;

        if ($role->save()) {
            $request->session()->flash('success', $request->name. ' foi cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'Falha ao cadastrar o perfil');
        }

        return redirect()->route('admin.roles.index');
    }

    public function index()
    {
        $this->setBreadcumb([
            'icon' => 'settings',
            'label' => 'Configurações']);

        $this->setBreadcumb([
            'link' => route('admin.roles.index'),
            'icon' => 'person',
            'active' => true,
            'label' => 'Perfis']);

        if (Auth::user()->can('resource', 'manage.roles')) {
            $roles = Role::all();
            return view('admin.roles.home')->with('roles', $roles);
        } else {
            return $this->denies();
        }
    }

    public function edit(Role $role)
    {
        $this->setBreadcumb([
            'icon' => 'settings',
            'label' => 'Configurações']);

        $this->setBreadcumb([
            'link' => route('admin.users.index'),
            'icon' => 'person',
            'active' => false,
            'label' => 'Pèrfis']);

        $this->setBreadcumb([
            'link' => route('admin.users.edit', $role->id),
            'active' => true,
            'icon' => 'edit',
            'label' => ' ' .$role->name]);

        if (Auth::user()->can('resource', 'manage.roles')) {
            $resources = Resource::all();
            return view('admin.roles.edit')->with([
                'role' => $role,
                'resources_group' => $resources->groupBy('controller')
            ]);
        } else {
            return $this->denies();
        }
    }

    public function update(Request $request, Role $role)
    {
        $role->resources()->sync($request->resources);
        $role->name       = $request->name;

        if ($role->save()) {
            $request->session()->flash('success', $request->name. ' foi atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'Falha ao atualizar o perfil');
        }
        if (Auth::user()->can('resource', 'manage.roles')) {
            return redirect()->route('admin.roles.index');
        }else {
            return $this->denies();
        }

    }

    public function destroy(Role $role)
    {
        if (Auth::user()->can('resource', 'manage-roles')) {
            $role->delete();
            return redirect()->route('admin.roles.index');
        } else {
            return '';
        }

    }
}
