
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('dashboard_asset') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard_asset') }}/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('dashboard_asset') }}/assets/plugins/pace/pace.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('dashboard_asset') }}/assets/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard_asset') }}/assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dashboard_asset') }}/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard_asset') }}/assets/images/neptune.png" />

</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="{{ route('register') }}">Neptune</a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
            <div class="auth-credentials m-b-xxl">
                <label for="signUpUsername" class="form-label">Name</label>
                <input type="name" class="form-control m-b-md @error('name')
                is-invalid
                @enderror" placeholder="Enter Name" name="name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="signUpEmail" class="form-label">Email address</label>
                <input type="email" class="form-control m-b-md @error('email')
                is-invalid
                @enderror" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" name="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="signUpPassword" class="form-label">Password</label>
                <input type="password" class="form-control @error('password')
                is-invalid
                @enderror" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="signUpPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="password_confirmation">
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
            <div class="divider"></div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('dashboard_asset') }}/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('dashboard_asset') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard_asset') }}/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('dashboard_asset') }}/assets/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('dashboard_asset') }}/assets/js/main.min.js"></script>
    <script src="{{ asset('dashboard_asset') }}/assets/js/custom.js"></script>
</body>
</html>
