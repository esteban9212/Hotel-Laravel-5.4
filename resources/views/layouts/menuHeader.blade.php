<!DOCTYPE html>
<html>
<head>
    <title></title>


    <style>
.fondo{
     background-image: url("https://images.unsplash.com/photo-1439130490301-25e322d88054?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94db2a57c96076e071770b9cfe2ed06a&auto=format&fit=crop&w=1189&q=80%201189w");
     background-attachment: fixed;

background-size: cover;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-position: center top;

}
.blanco{
  color: white;
}

.jumbotron.jumbotron-fluid.fondo {
    margin-bottom: 0px;
}
    </style>



</head>
<body>


<div class="jumbotron jumbotron-fluid fondo">
  <div class="container">
    <h1 style="color: white" class="display-3 blanco">Bienvenido {!! Auth::user()->name !!}</h1>
    <p class="lead blanco">Encuentra el mejor hotel!!</p>
  </div>
</div>
 <header style="background: #00599c" class="main-header">





        <ul class="nav navbar-nav">
            <li>
                <a href="/main">Home</a>
            </li>
            <li>
                <a href="/searchHotel">Buscar Hoteles</a>
            </li>
            <li>
                <a href="/createHotel">Crear Hoteles</a>
            </li>
        </ul>

        <!-- Header Navbar -->
        <nav  class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="http://i1.mendozapost.com/files/image/7/7142/54b6f4c45797b_1420_!.jpg?s=270345070aa93e05e936c1b6f31c0904&d=1421508947"
                                 class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                        </a>
                        <ul class="dropdown-menu">

                            <!-- Menu Footer-->
                         
                                <div class="pull-right">
                                    <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sign out
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                          
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</body>
</html>







