@extends('template.cork')

@section('title', 'Lista de Produtos')
@section('nav_title', 'Lista de Produtos')

@push('scripts')
    <script src="{{ url(mix('assets/js/jquery.dataTables.js')) }}"></script>
    <script src="{{ url(mix('assets/js/dataTables.bootstrap.js')) }}"></script>
    <script>
        $('#table').DataTable({
            "oLanguage": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "_": "Selecionado %d linhas",
                        "0": "Nenhuma linha selecionada",
                        "1": "Selecionado 1 linha"
                    }
                },
                "buttons": {
                    "copy": "Copiar para a área de transferência",
                    "copyTitle": "Cópia bem sucedida",
                    "copySuccess": {
                        "1": "Uma linha copiada com sucesso",
                        "_": "%d linhas copiadas com sucesso"
                    }
                }
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
@endpush
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget-three">
                    <div class="widget-content widget-content-area br-6">
                        @can('resource', 'product.create')
                        <a href="{{ route('products.create') }}"><button class="btn btn-outline-success mb-2 btn-rounded float-left">Novo</button></a>
                        @endcan
                        <div class="table-responsive mb-4 mt-4">
                            <table id="table" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Status</th>
                                    <th class="no-content">Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td width="95"><img width="75" height="75" class="img-fluid rounded-circle" src="{{ asset('storage/img/products/'.$product->image) }}"/> </td>
                                        <td>{{ $product->title }}</td>
                                        <td>{!! $product->getStatus() !!}</td>
                                        <td width="220">
                                            <div>
                                                @can('resource', 'product.edit')
                                                <a href="{{ route('products.edit', $product->id) }}"><button class="btn btn-outline-primary mb-2 btn-rounded float-left">Editar</button></a>
                                                @endcan
                                                    @can('resource', 'product.delete')
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="float-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button TYPE="submit" class="btn btn-outline-danger mb-2 btn-rounded">Excluir</button>
                                                        @endcan
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                <tfoot>
                                <tr>
                                    <th>Título</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
        </div>
    </div>

@endsection

