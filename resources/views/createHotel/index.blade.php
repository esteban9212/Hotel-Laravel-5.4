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

        nav.navbar.navbar-static-top {
    margin-left: 300px;
}

.btn-primary {
    background-color: #00599c;
    border-color: #00599c;
}

    </style>


</head>
<body>

@include('layouts.menuHeader')


<h1 class="centrado" >Creación  de hoteles</h1>
 <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'hotels.store']) !!}

                            <div class="form-group col-sm-6">
                                {!! Form::label('name', 'Nombre:') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Adress Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('adress', 'Dirección:') !!}
                                {!! Form::text('adress', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Price Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('price', 'Precio habitación:') !!}
                                {!! Form::number('price', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Rating Field -->
                            <div class="form-group col-sm-6">

                        {!! Form::hidden('rating', 0, ['class' => 'form-control']) !!}

                            </div>

                            <!-- Image Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('image', 'URL imagen:') !!}
                                {!! Form::text('image', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- City Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('city_id', 'Ciudad:') !!}
                                {!! Form::select('city_id',$cities, null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{!! url('main') !!}" class="btn btn-default">Cancel</a>
                            </div>

                    {!! Form::close() !!}
                </div>

                     @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
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