<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- css link --}}
    <link rel="stylesheet" href="{{ asset('dashboard_asset/assets/css/custom.css') }}">
    {{-- faviccon link --}}
    <link rel="shortcut icon" href="{{ asset('uploads/img/light.png') }}" type="image/x-icon">
    {{-- fontawsome cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="animated-background">


{{-- button area design --}}

<div class="d-flex justify-content-center align-items-center vh-100 gap-3">
    <a href="{{ route('login') }}"><button class="btn btn-primary fw-bold fs-5 animated-button2">Keep Login <i class="fa-solid fa-right-to-bracket"></i></button></a>
    <a href="{{ route('register') }}"><button class="btn btn-warning fw-bold text-white font-medium animated-button fs-5">Keep Register <i class="fa-solid fa-id-card"></i></button></a>
</div>




    {{-- bootstrap link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
