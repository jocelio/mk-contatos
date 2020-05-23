@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col">
                            Usuários
                        </div>
                        <div class="col pull-right">
                            <a href="{{ route('invite') }}" class="float-right btn btn-info"> Convidar </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <a class="alert alert-success d-block" href="whatsapp://send?text={{ session('link') }}" role="alert">
                            {{ session('status') }}
                        </a>
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

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
