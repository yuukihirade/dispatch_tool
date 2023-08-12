<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>@yield('title')</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
        
        <!-- Scripts -->
         {{-- Javascriptを読み込みます --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>

    </head>
    <body>
        <div id="app">
            {{---->ナヴィゲーションバー--}}
            <nav class="navbar navbar-expand-xl navbar-light bg-light">
              <div class="container">
                <a class="navbar-brand" href="{{ route('calendar') }}">平商事</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarWithDropdown" aria-controls="navbarWithDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse show" id="navbarWithDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ route('calendar') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('dispatch.request.add') }}">Dispatch Application Form</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('dispatch.request.index') }}">Dispatch Request List</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('driver.dispatch') }}">Driver Today's Dispatch</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        for Only Administrator
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('admin.user.index') }}">User Management</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        for User
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('customer.index') }}">Management for Customers</a></li>
                        <li><a class="dropdown-item" href="{{ route('customer.location.add') }}">Customer's Location Registration Form</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Management Consoles
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('customer.index') }}">Management for Customers</a></li>
                        <li><a class="dropdown-item" href="{{ route('dispatch.car.index') }}">Management for Cars</a></li>
                      </ul>
                    </li>
                    
                    <!--Authentication Links-->
                    <!--ログインしていればユーザー名とログアウトリンクを表示-->
                    @auth
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" aria-current="page" role="button" data-bs-toggle="dropdown" aria-expended="false">{{ Auth::user()->name }}<span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('messages.logout') }}
                          </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                          @csrf
                        </form>
                      </li>
                    @endauth
                  </ul>
                </div>
              </div>
            </nav>
            
            
            
            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>