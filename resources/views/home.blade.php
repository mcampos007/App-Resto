@extends('layouts.app')

@section('title','Bienvenido a Aristaeus Panel de Control')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url(' {{ asset('img/Demofondo1.jpeg') }}'); background-size: cover; background-position: top center;">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section ">
            <h2 class="title text-center">Mi Comanda</h2>
            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="active">
                    <a href="#dashboard" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Mi Comanda
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/categories')}}" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Promociones
                    </a>
                </li>
                <!-- <li>
                    <a href="{{ url('/admin/products')}}" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Productos
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/promotions')}}" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Promociones
                    </a>
                </li> -->

            </ul>

             <hr>
            <p>Tu comanda tiene {{ auth()->user()->cart->details->count() }} Items</p>
            <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th >Precio</th>
                                <th >Cantidad</th>
                                <th >Sub total</th>
                                <th >Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( auth()->user()->cart->details as $detail)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ $detail->product->featured_image_url }}" height="50">
                                </td>
                                <td>
                                    <a href=" {{ url('/products/'.$detail->product->id ) }}" > {{ $detail->product->name }}
                                </td>
                                <td >$ {{ $detail->product->price }}</td>
                                <td> {{ $detail->quantity }}</td>
                                <td> $ {{ $detail->quantity * $detail->product->price }}</td>
                                <td class="td-actions">
                                    
                                    <form method="post" action="{{ url('/cart') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}
                                        <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                        <a href=" {{ url('/products/'.$detail->product->id ) }}" target="_blank" type="button" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
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
            <div class="text-center">
                <form method="post" action="{{ url('/order')}}">
                    {{ csrf_field() }}
                    <button class="btn btn-primary btn-round">
                        <i class="material-icons">done</i> Confirmar Comanda
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection

