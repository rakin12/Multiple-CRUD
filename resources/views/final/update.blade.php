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
                    @if(session('message'))
                        <div class="alert alert-success">{{session('message')}} </div>
                    @endif
                    <div>
                        {!! Form::open(['route' => ['finalls.update',@$finall->id],'method'=>'POST']) !!}
                            <div>
                                {{Form::label('title', 'Name', ['class' => 'awesome'])}}
                                {{Form::text('name', @$finall->name)}}
                            </div>
                            <div>
                                {{Form::label('title', 'Email', ['class' => 'awesome'])}}
                                {{Form::text('email', @$finall->email)}}
                            </div>
                            <div>
                                {{Form::label('title', 'Address', ['class' => 'awesome'])}}
                                {{Form::text('address', @$finall->address)}}
                            </div>
                            <div>
                                {{Form::label('title', 'Date of Birth', ['class' => 'awesome'])}}
                                {{Form::date('dateOfBirth', @$finall->dateOfBirth)}}
                            </div>
                            <div>
                                {{Form::label('title', 'Phone', ['class' => 'awesome'])}}
                                {{Form::text('phone', @$finall->phone)}}
                            </div>
                            <div>
                                {{ csrf_field() }}
                                {{Form::hidden('_method','PUT')}}
                                {{Form::submit('Click Me!')}}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
