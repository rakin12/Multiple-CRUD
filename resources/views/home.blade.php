@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('finalls.index')}}" class="btn btn-primary">CRUD 1</a><br><br>
                    <a href="{{route('finallls.index')}}" class="btn btn-primary">CRUD 2</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
