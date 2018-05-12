
<!DOCTYPE html>
<html>
<head>
	<title></title>





    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" type="text/css" href="main.css">





    <style>
        ul.dropdown-menu {
            background: none;
            border: none;
        }
        .centrado {
          background-color: #fafafa;
          margin: 1rem;
          padding: 1rem;
          border: 2px solid #ccc;
          /* IMPORTANTE */
          text-align: center;
        }
        .hotel-item {
            background: blue;
            background-color: #fafafa;
            margin: 1rem;
            padding: 1rem;
            border: 2px solid #ccc;
              /* IMPORTANTE */
            text-align: center;
            margin-right: 5px;
            margin-left: 5px;
            display: inline-block;

        }

         .padre {
           text-align: center;
        }

        a {
            color: white;
        }
        span.o-hotel-review__score {
            display: inline-block;
            vertical-align: middle;
            background: #2681FF;
            border-radius: 14px;
            font-family: arial, sans-serif;
            padding: 0 10px;
            font-size: 16px;
            color: #A8CCFF;
            line-height: 1.3;
        }

        .o-price__num {
            color: #f60;
            font-size: 22px;
            line-height: 1.1;
            font-weight: bolder;
        }

        #myInput {
            background-image: url('/css/searchicon.png'); /* Add a search icon to input */
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 100%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
        }

        #myTable {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full-width */
            border: 1px solid #ddd; /* Add a grey border */
            font-size: 18px; /* Increase font-size */
        }

        #myTable th, #myTable td {
            text-align: left; /* Left-align text */
            padding: 12px; /* Add padding */
        }

        #myTable tr {
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid #ddd; 
        }

        #myTable tr.header, #myTable tr:hover {
            /* Add a grey background color to the table header and on hover */
            background-color: #f1f1f1;
        }

        .nav-tabs>li>a {
            margin-right: 2px;
            line-height: 1.42857143;
            border: 1px solid transparent;
            border-radius: 4px 4px 0 0;
             background: #337ab7;
         }

        nav.navbar.navbar-static-top {
            margin-left: 300px;
        }
        .btn-group>.btn:first-child {
    margin-left: 0;
    background: #00599c;
    color: white;
}
    </style>

<script>

function myFunction1() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function myFunction2() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

</head>
<body>

@include('layouts.menuHeader')




<h1 class="centrado" >Bienvenido, disfrute de nuestros mejores hoteles</h1>

<div class="padre">
    
    @foreach($hotels as $hotel)
       
            
             <div class="hotel-item">
                <h3>{{$hotel->name}}</h3>
                <h5>{{$hotel->city->name}}, {{$hotel->city->country}}</h5>
              
                <img style="width: 250px; height:250px" src="{{$hotel->image}}" class="hotel-item">

                <p>Dirección: {{$hotel->adress}}</p>

                 <div class="o-price">                                          
                     Precio Habitación : <span class="o-price__currency"> </span>
                     <span class="o-price__num">$ {{ number_format($hotel->price, 2, ',', '.') }}</span>
                </div>


                <span class="o-hotel-review__score"><em>{{$hotel->rating}}</em>/5</span>
                <h5>{{  App\Models\Comment::where([ ['hotel_id', '=', $hotel->id],])->get()->count()}} Comentarios</h5>


                        {!! Form::open(['route' => ['hotels.destroy', $hotel->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('hotels.show', [$hotel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i> Visitar </a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                        {!! Form::close() !!}
            </div>
        
     

    @endforeach
</div>


<!-- jQuery 3.1.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>

@yield('scripts')
</body>
</html>