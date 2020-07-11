@extends('layouts.app')

@section('title','Bienvenido a DigTab by Infocam')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url(' {{ asset('img/Demofondo1.jpeg') }}');background-size: cover; background-position: top center;">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section ">
            <h2 class="title text-center">Editar Promoción Seleccionado </h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ url('admin/promotions/'.$promotion->id.'/edit') }}">
                {{csrf_field() }}
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la Promoción</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $promotion->name) }}">
                        </div>    
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio del  Promoción</label>
                            <input type="number"  step="0.01" class="form-control" name="price" value="{{ old('price',$promotion->price) }}">
                        </div>
                    </div>    
                </div>
                
                
                    <div class="form-group label-floating">
                        <label class="control-label">Descripción</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description',$promotion->description) }}">
                    </div>
               
        

                

                <textarea class="form-control" placeholder="Descipción extensa del promotiono" rows="5" name="long_description" >{{ old('long_description',$promotion->long_description) }}</textarea>
                
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href=" {{ url('/admin/promotions')}}" class="btn btn-default">Cancelar</a>
            </form>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection
