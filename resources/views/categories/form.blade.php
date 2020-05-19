@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Novo Registro</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if(Request::is('*/edit'))
                            {!! Form::model($category, ['method'=>'POST', 'url'=> '/categories/'.$category->id]) !!}
                        @else
                            {!! Form::open(['url' => 'categories/insert']) !!}
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                {!! Form::label('name', 'Nome') !!}
                                {!! Form::input('text', 'name', null, ['class' => 'form-control', 'autofocus','required', 'placeholder' => 'Nome'])  !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mt-4">
                                {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                                <a href="/contacts" class="float-right btn btn-default"> Voltar </a>
                            </div>
                        </div>

                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
