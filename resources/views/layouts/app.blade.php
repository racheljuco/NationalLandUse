
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- App CSS -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
    hr { display: block; height: 1px;
        border: 0; border-top: 3px solid #315c72;
        margin: 1em 0; padding: 0; }
    </style>

</head>
<body class="hold-transition">

    @yield('content')

<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
