@extends('template.cork')

@section('title', 'Cadastrar Produto')

@push('scripts')
    <link href="{{ url('plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ url('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        $(function () {
            var upload = new FileUploadWithPreview('upload')
        })
    </script>
@endpush

@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget-three">
            <div class="widget-content">
                <div class="widget-content widget-content-area br-6">
                    <div class="col-lg-6 col-12 mx-auto">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <p>Título</p>
                                <input id="title" type="text" name="title" placeholder="..." class="form-control" required="">
                            </div>
                            <div class="custom-file-container" data-upload-id="upload">
                                <label>Enviar Imagem<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file" >
                                    <input type="file" required name="file" id="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
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

