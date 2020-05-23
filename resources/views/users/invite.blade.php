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

                    <form action="{{ route('invite') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email do usuário" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Enviar Convite</button>
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
