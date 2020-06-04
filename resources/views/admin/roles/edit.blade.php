@extends('template.cork')

@section('title', 'Editar Perfil')

@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget-three">
            <div class="widget-content">
                <div class="widget-content widget-content-area br-6">
                    <div class="col-lg-6 col-12 mx-auto">
                        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <p>Nome</p>
                                <input id="name" value="{{ $role->name }}" type="text" name="name" placeholder="..." class="form-control" required="">
                            </div>
                            <p>Recursos do sistemas</p>
                            <div id="withoutSpacing" class="no-outer-spacing">
                                @foreach($resources_group as $group)
                                <div class="card">
                                    <div class="card-header" id="headingOne2">
                                        <section class="mb-0 mt-0">
                                            <div role="menu" class="" data-toggle="collapse" data-target="#group_{{$group[0]->id}}" aria-expanded="true" aria-controls="withoutSpacingAccordionOne">
                                               {{ $group[0]->controller }}
                                            </div>
                                        </section>
                                    </div>

                                    <div id="group_{{$group[0]->id}}" class="collapse" aria-labelledby="headingOne2" data-parent="#withoutSpacing">
                                        <div class="card-body">
                                            @foreach($group as $g)
                                                <div class="n-chk text-left">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                        <input type="checkbox" name="resources[]" value="{{ $g->id }}" class="new-control-input inbox-chkbox"
                                                               @if ($role->resources->pluck('id')->contains($g->id)) checked @endif
                                                        >
                                                        <span class="new-control-indicator"></span>
                                                        <span>{{ $g->action }}</span>
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="n-chk text-center" style="padding-top: 20px">
                                <button type="submit" class="btn btn-outline-success mb-2 btn-rounded">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

