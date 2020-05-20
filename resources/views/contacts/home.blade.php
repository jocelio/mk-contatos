@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col">
                            Contatos
                        </div>
                        <div class="col pull-right">
                            <a href="/contacts/create" class="float-right btn btn-info"> Novo </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Celular</th>
                                <th>Telefone</th>
                                <th>Desc. Produtos</th>
                                <th>H. Funcionamento</th>
                                <th>Cidade</th>
                                <th>Envio</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td data-order="{{$contact->name}}">{{$contact->name}}</td>
                                    <td>{{$contact->phone1}}</td>
                                    <td>{{$contact->phone2}}</td>
                                    <td>{{$contact->product_description}}</td>
                                    <td>{{$contact->opening_hours}}</td>
                                    <td>{{$contact->city}}</td>
                                    <td>{{$contact->shipping_method}}</td>
                                    <td class="btn-group">

                                        {!! Form::model($contact, ['method'=>'DELETE', 'url'=> 'contacts/'.$contact->id]) !!}
                                        <a href="/contacts/{{$contact->id}}/edit" class="btn btn-outline-info">Editar</a>
                                        <button type="submit" onClick="return confirmDeletion()" class="btn btn-outline-danger">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
