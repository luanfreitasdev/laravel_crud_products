@extends('template.cork')

@section('title', 'Editar Usuário')

@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget-three">
            <div class="widget-content">
                <div class="widget-content widget-content-area br-6">
                    <div class="col-lg-6 col-12 mx-auto">
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <p>Nome</p>
                                <input id="name" type="text" name="name" placeholder="..." class="form-control" required="">
                            </div>
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

