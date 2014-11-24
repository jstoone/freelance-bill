<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="publish-key" content="{{Config::get('services.stripe.publish')}}"
  <title>Billing</title>
</head>
<body>
  <div class="content">
    @yield('content')
  </div>

  @yield('footer')
</body>
</html>
