@extends('template.cork')

@section('title', 'Editar Usuário')

@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget-three">
            <div class="widget-content">
                <div class="widget-content widget-content-area br-6">
                    <div class="col-lg-6 col-12 mx-auto">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <p>Nome</p>
                                <input id="name" value="{{ $user->name }}" type="text" name="name" placeholder="..." class="form-control" required="">
                            </div>
                            <p>Perfil</p>
                            @foreach($roles as $role)
                                    <div class="n-chk text-left">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="new-control-input inbox-chkbox"
                                            @if ($user->roles->pluck('id')->contains($role->id)) checked @endif
                                            >
                                            <span class="new-control-indicator"></span>
                                            <span>{{ $role->name }}</span>
                                        </label>
                                    </div>
                            @endforeach
                            <div class="n-chk text-center">
                                <button type="submit" class="btn btn-outline-success mb-2 btn-rounded">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

