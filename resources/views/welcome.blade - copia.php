@extends('layouts.app')

@section('title','Bienvenido a Aristaeus by Infocam')

@section('body-class','landing-page')

@section('styles')
    <style >
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }

        .team .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -webkit-flexbox;
            display: -ms-flexbox;
            display: flex;
            flex-wrap:wrap;
        }
        .team .row > [class*='col-']{
            display: flex;
            flex-direction: column;
        }
    </style>

@endsection

@section('content')
<!--<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
-->
<div class="header header-filter" style="background-image: url(' {{ asset('img/Demofondo1.jpeg') }}'); background-size: cover; background-position: top center;">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvenido a Mario's.</h1>
                <h4>Horneando la mejor pizza en Salta desde 1996.!!"</h4>
                <h4>Making the best pizza in town since 1996"</h4>
                <br />

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> ¿Como funciona?
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="team">
                <h2 class="title">Nuestras Promociones</h2>
                <div class="row">
                    @foreach($promotions as $promotion)
                    <div class="col-md-4">
                        <!-- <div class="info"> -->
                            <div class="team-player">
                                <img src="{{ $promotion->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle"width="200" height="200">   
                                <h4 class="title">{{ $promotion->name }} <br />
                                </h4>
                                <p class="description">{{ $promotion->description }}</p>                     
                            </div>
                        <!-- </div> -->
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    {{ $promotions->links()}}
                </div>
            </div>
        </div>        
<!--     </div>       
    <div class="container"> -->
        <div class="section text-center">
            <h2 class="title">Todo lo que tenemos para vos</h2>
            <form class="form-inline" method="get" action="{{ url('search')}}">
                <input type="text" placeholder="¿Que estas buscando?" name="query" class="form-control" id="search">
                <button class="btn btn-primary btn-just-icon" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </form>
            <div class="team">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{ $category->featured_Image_url }}" alt="Imágen de la Categoria" class="img-raised img-circle">
                            
                            <h4 class="title">
                                <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}    </a>
                                
                                
                            </h4>
                            <p class="description">{{ $category->description }}</p>
                           
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                     
                </div>
            </div>
        </div>

        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">Nos interesa tu opinión</h2>
                    <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tu Nombre</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tu correo electrónico</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Tu mensaje</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Enviar Mensaje
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@include('includes.footer')
@endsection

@section('scripts')
    <script src=" {{ asset('js/typeahead.bundle.min.js')}}" type="text/javascript"></script>
    <script >
        $(function(){
            // Inicializar typeahead sobre nuestro input de busqueda
            var products = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,
              // `states` is an array of state names defined in "The Basics"
              local: ['hola','prueba1','prueba2','hola2','abcde']
            });

            $('#search').typeahead({
                hint:true,
                highlight: true,
                minLength:1
            },{
                name:'products',
                source:products
            })
        });
    </script>
@endsection
