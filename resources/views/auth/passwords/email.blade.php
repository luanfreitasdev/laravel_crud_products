
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>

    <link href="{{ url(mix('assets/css/loader.css')) }}" rel="stylesheet" type="text/css" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="{{ url(mix('assets/css/bootstrap.css')) }}" rel="stylesheet" type="text/css" />
    <link href="{{ url(mix('assets/css/plugins.css')) }}" rel="stylesheet" type="text/css" />
    <link href="{{ url(mix('assets/css/structure.css')) }}" rel="stylesheet" type="text/css" class="structure" />
    <link href="{{ url(mix('assets/css/authentication/form-2.css')) }}" rel="stylesheet">
    <link href="{{ url(mix('assets/css/forms/theme-checkbox-radio.css')) }}" rel="stylesheet">

</head>
<body class="form">


<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class="">{{ __('Reset Password') }}</h1>

                    <form method="POST" class="text-left" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <label for="username">{{ __('E-Mail Address') }}</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ url(mix('assets/js/jquery.js')) }}"></script>
<script src="{{ url(mix('assets/js/bootstrap.js')) }}"></script>
<script src="{{ url(mix('assets/js/app.js')) }}"></script>

<script src="{{ url(mix('assets/js/authentication/form-2.js')) }}"></script>

</body>
</html>


