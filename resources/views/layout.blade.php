<x-app-layout>
<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
</x-app-layout>