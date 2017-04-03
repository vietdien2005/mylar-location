<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Meetup') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body class="login-body">

    <div class="container">
        <form class="form-signin" role="form" method="POST" action="{{ url('login') }}">
            {{ csrf_field() }}
            <h2 class="form-signin-heading">sign in</h2>
            <div class="login-wrap">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            </div>
        </form>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>