@if (session('success'))
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/elements/alert.css') }}">
        <div class="alert alert-arrow-left alert-icon-left alert-light-primary mb-4"
             role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            <strong>:) </strong> {{ session('success') }}
        </div>
    </div>
@endif

@if (session('warning'))
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/elements/alert.css') }}">
        <div class="alert alert-arrow-left alert-icon-left alert-light-warning mb-4"
             role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            <strong>Atenção !</strong> {{ session('warning') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/elements/alert.css') }}">
        <div class="alert alert-arrow-left alert-icon-left alert-light-danger mb-4"
             role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            <strong>Erro !</strong> {{ session('error') }}
        </div>
    </div>
@endif
