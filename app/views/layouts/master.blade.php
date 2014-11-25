<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="publish-key" content="{{Config::get('services.stripe.publish')}}">
  <title>Billing</title>

  <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
  <link rel="stylesheet" href="/css/main.css"/>
</head>
<body>
  <div class="container">
    @include('flash::message')
    @yield('content')
  </div>

  <footer>
    @yield('footer')
    <script type="text/javascript" src="/js/vendor/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
  </footer>
</body>
</html>
