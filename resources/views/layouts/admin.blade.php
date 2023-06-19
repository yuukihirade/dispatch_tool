<html>
    <head>
        <title>@yield('title')</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">

    </head>
    <body>
        <div id="app">
            {{---->ナヴィゲーションバー--}}
            <nav class="navbar navbar-expand-xl navbar-light bg-light">
              <div class="container">
                <a class="navbar-brand" href="#">平商事</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarWithDropdown" aria-controls="navbarWithDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse show" id="navbarWithDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Dispatch Application Form</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Dispatch Request List</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Driver Calendar</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Registration Forms for Only Administrator
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Department for User</a></li>
                        <li><a class="dropdown-item" href="#">User Registration Form</a></li>
                        <li><a class="dropdown-item" href="#">Size Category for Car</a></li>
                        <li><a class="dropdown-item" href="#">Item for Request Item</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Registration Forms for User
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Customer Registration Form</a></li>
                        <li><a class="dropdown-item" href="#">Pickup Location for Customer</a></li>
                        <li><a class="dropdown-item" href="#">Car Registration Form</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Management Consoles
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Management for Customers</a></li>
                        <li><a class="dropdown-item" href="#">Management for Pickup Locations</a></li>
                        <li><a class="dropdown-item" href="#">Management for Cars</a></li>
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