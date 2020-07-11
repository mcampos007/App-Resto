@extends('layouts.app')

@section('title','Todas nuestras Propuestas')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url(' {{ asset('img/Demofondo1.jpeg') }}');background-size: cover; background-position: top center;">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Promociones</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/promotions/create')}}" class="btn btn-primary btn-round">Nueva Promoción</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripcion</th>
                                <!-- <th class="text-center">Categoria</th> -->
                                <th >Precio</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promotions as $promotion)
                            <tr>
                                <td class="text-center">{{ $promotion->id }}</td>
                                <td>{{ $promotion->name }}</td>
                                <td>{{ $promotion->description }}</td>
                                <!-- <td>{{ $promotion->category ? $promotion->category->name : 'General' }}</td> -->
                                <td class="text-right">$ {{ $promotion->price }}</td>
                                <td class="td-actions text-right">
                                    
                                    <form method="post" action="{{ url('/admin/promotions/'.$promotion->id)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}
                                        <a href="" type="button" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                        </a>
                                        <a href=" {{ url('/admin/promotions/'.$promotion->id.'/edit')}}" type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <a href=" {{ url('/admin/promotions/'.$promotion->id.'/images')}}" type="button" rel="tooltip" title="Imagenes" class="btn btn-warning btn-simple btn-xs">
                                        <i class="fa fa-image"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $promotions->links() }}
                </div>
            </div>

        </div>
    </div>
</div>

@include('includes.footer')
@endsection
