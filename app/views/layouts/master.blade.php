<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="publish-key" content="{{Config::get('services.stripe.publish')}}">
  <title>Billing</title>

  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="/css/main.css?v={{ filemtime('/css/main.css') }}"/>
</head>
<body>
  <div class="container">
    @include('flash::message')
    @yield('content')
  </div>

  <footer>
    <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    @yield('footer')
  </footer>
</body>
</html>
