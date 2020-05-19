@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col">
                            Categorias
                        </div>
                        <div class="col pull-right">
                            <a href="/categories/create" class="float-right btn btn-info"> Novo </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td data-order="{{$category->name}}">{{$category->name}}</td>
                                    <td class="btn-group">

                                        {!! Form::model($category, ['method'=>'DELETE', 'url'=> 'contact/'.$category->id]) !!}
                                        <a href="/categories/{{$category->id}}/edit" class="btn btn-outline-info">Editar</a>
                                        <button type="submit" onClick="return confirmDeletion()"
                                                href="/categories/{{$category->id}}/excluir" class="btn btn-outline-danger">Excluir</button>
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
