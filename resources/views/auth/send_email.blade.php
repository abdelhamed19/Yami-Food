<!DOCTYPE html>
<html>
<head>
    <title>Reset</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href={{ asset('assets/auth/style.css') }} rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 form-block px-4">
                <div class="col-lg-8 col-md-6 col-sm-8 col-xs-12 form-box">
                    <div class="text-center mb-3 mt-5">
                        <img src={{ asset('assets/auth/logo.png') }} width="150px">
                    </div>
                    <div class="reset-form d-block">
                        <form action="{{ route('postReset') }}" method="POST" class="reset-password-form">
                            @csrf
                            <h4 class="mb-3 text-center">Reset Your password</h4>
                            <p class="mb-3" style="color: #777">
                                Please enter your email address and we will send you a password reset link.
                            </p>
                            <div class="form-input">
                                <span><i class="fa fa-envelope-o"></i></span>
                                <input type="email" name="email" placeholder="Email Address" tabindex="10">
                                <x-error-message name="email" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn">Send Reset Link</button>
                            </div>
                            <div class="text-center mb-5">
                                Already have password
                                <a class="login-link" href="{{ route('login') }}">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
        </div>
    </div>

</body>

</html>
