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
                            {!! Form::model($contact, ['method'=>'POST', 'url'=> '/contacts/'.$contact->id]) !!}
                        @else
                            {!! Form::open(['url' => 'contacts/insert']) !!}
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                {!! Form::label('name', 'Nome') !!}
                                {!! Form::input('text', 'name', null, ['class' => 'form-control', 'autofocus','required', 'placeholder' => 'Nome'])  !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('name', 'Categoria') !!}
                                    {!! Form::select( 'id_category', $categories, null, ['class' => 'form-control', 'autofocus','required', 'placeholder' => 'Categoria'])  !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                {!! Form::label('phone1', 'Celular') !!}
                                {!! Form::input('text', 'phone1', null, ['class' => 'form-control', 'autofocus','required', 'placeholder' => 'Telefone'])  !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                {!! Form::label('phone2', 'Telefone (Opcional)') !!}
                                {!! Form::input('text', 'phone2', null, ['class' => 'form-control', 'required', 'placeholder' => 'Telefone'])  !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                {!! Form::label('city', 'Cidade') !!}
                                {!! Form::input('text', 'city', null, ['class' => 'form-control', 'autofocus','required', 'placeholder' => 'Cidade'])  !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                {!! Form::label('opening_hours', 'Horário de Funcionamento') !!}
                                {!! Form::input('text', 'opening_hours', null, ['class' => 'form-control', 'required', 'placeholder' => 'Horário de Funcionamento'])  !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                {!! Form::label('shipping_method', 'Forma de Envio') !!}
                                {!! Form::input('text', 'shipping_method', null, ['class' => 'form-control', 'required', 'placeholder' => 'Forma de Envio'])  !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                {!! Form::label('product_description', 'Descrição de produtos') !!}
                                {!! Form::input('textarea', 'product_description', null, ['class' => 'form-control', 'autofocus','required', 'placeholder' => 'Descrição de produtos'])  !!}
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
