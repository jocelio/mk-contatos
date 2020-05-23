@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Convidar Usuário</div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('create', ['token'=>$token]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Nome Completo" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Senha" required/>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sue senha" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Criar Usuário</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
