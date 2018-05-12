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
    width: 100px;
    height: 40px;
        display: grid;
}
    </style>

<script>

function buscar() {

  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  option=document.getElementById("p1").value;

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[option];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}


function onChange(value) {
     input=document.getElementById("myInput");
     if(value==="0"){
        input.placeholder="Escribe nombre del hotel...";
     }
     if(value==="3"){
        input.placeholder="Escribe nombre de la ciudad...";
     }
}
</script>

</head>
<body>
@include('layouts.menuHeader')


    <h1 class="centrado" >Busqueda de hoteles</h1>

<p>criterio de  busqueda </p>
    <div class="form-group col-md-4">
      <select id="p1" class="form-control "  onchange="onChange(this.value)">
        <option selected value="0">Busqueda por Nombre de hotel</option>
        <option value="3">Busqueda por Ciudad</option>
      </select>
    </div>


    <input class="centrado" type="text" id="myInput" onkeyup="buscar()" placeholder="Escribe nombre del hotel...">

    <table id="myTable" >
      <tr class="header" style="background: #00599c; color: white">
        <th style="width:20%;">Nombre</th>
        <th style="width:20%;">Precio por habitación</th>
        <th style="width:20%;">Calificación</th>
        <th style="width:20%;">Ciudad</th>
        <th style="width:20%;">Opción</th>
      </tr>
     @foreach($hotels as $hotel)
              
      <tr>

        <td>
            <img style="width: 100px; height:100px" src="{{$hotel->image}}" class="hotel-item">
             {{$hotel->name}}
        </td>

        <td>
            <h3>$ {{ number_format($hotel->price, 2, ',', '.') }}</h3>
        </td>

        <td>
            <h3><em>{{$hotel->rating}}</em>/5</h3>
        </td>
        <td>
            <h3>{{$hotel->city->name}}, {{$hotel->city->country}}</h3>
        </td>

        <td> 
            {!! Form::open(['route' => ['hotels.destroy', $hotel->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('hotels.show', [$hotel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i> Visitar </a>
                </div>
            {!! Form::close() !!}   
         </td>

      </tr>
                            
        @endforeach

    </table>
</body>
</html>

