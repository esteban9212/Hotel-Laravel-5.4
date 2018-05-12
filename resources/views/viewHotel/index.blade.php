

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
@include('layouts.menuHeader')
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

        .centro {
            background-color: #fafafa;
            border: 2px solid #ccc;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            margin-top: 15px;
            margin-bottom: 15px;
        }
         hr{ 
           height:15px; 
           background-color:white; 

         } 
         .comment-item {

            margin-left: 5%;
            display: flex;
        }

        .contenidoIzq{
             width: 20%;
             margin: 1% 1%;
        }
        .contenidoDer{
             width: 60%;
             margin: 1% 1%;
        }

    </style>

<div class="padre">
    <div class="centro">
       
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

            </div>

            @foreach($hotel->comments as $comment)
                <hr>  
                                   
                <div class="comment-item">

                    <div class="contenidoIzq"> 
                        <h5>{!! $comment->created_at->format('D d/M/Y H:i') !!} </h5> 
                        <h3>{{    App\User::where([ ['id', '=', $comment->user_id],])->first()->name   }} comentó:</h3>
                         <span class="o-hotel-review__score"><em>{{$comment->Qualification}}</em>/5</span>
                    </div>

                     <div class="contenidoDer"> 

                        <h5>{{$comment->description}}</h5>  
                    </div>

                </div>
                                   
            @endforeach

         <hr> 
            <div class="hotel-item">

                 {!! Form::open(['route' => 'comments.store']) !!}

                        {!! Form::hidden('hotel_id', $hotel->id, ['class' => 'form-control']) !!}
                        {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}

                        <!-- Description Field -->
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('description', 'Description:') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                            <!-- Qualification Field -->
                       <div class="form-group col-sm-6">
                            {!! Form::label('Qualification', 'Qualification:') !!}
                           {!! Form::select('Qualification', array('5' => '5', '4' => '4','3' => '3', '2' => '2', '1' => '1'),['class' => 'form-control'])!!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Comentar', ['class' => 'btn btn-primary']) !!}
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
             
</div>