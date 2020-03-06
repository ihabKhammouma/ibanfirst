
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Ibanfirst- @yield('title')</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <a class="navbar-brand" href="{{ url('wallets') }}">Ibanfirst</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('wallets') }}">Wallets</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('financial-movements') }}">Financial Movements <span class="sr-only">(current)</span></a>
            </li>
            
          </ul>
        </div>
      </nav>
    <div class="container">
        @yield('content')
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>