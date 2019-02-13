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
                        {!! Form::open(['route' => ['finallls.update',@$finalll->id],'method'=>'POST']) !!}
                            <div>
                                {{Form::label('title', 'Name', ['class' => 'awesome'])}}
                                {{Form::text('name', @$finalll->name)}}
                            </div>
                            <div>
                                {{Form::label('title', 'Email', ['class' => 'awesome'])}}
                                {{Form::text('email', @$finalll->email)}}
                            </div>
                            <div>
                                {{Form::label('title', 'Address', ['class' => 'awesome'])}}
                                {{Form::text('address', @$finalll->address)}}
                            </div>
                            <div>
                                {{Form::label('title', 'Date of Birth', ['class' => 'awesome'])}}
                                {{Form::date('dateOfBirth', @$finalll->dateOfBirth)}}
                            </div>
                            <div>
                                {{Form::label('title', 'Phone', ['class' => 'awesome'])}}
                                {{Form::text('phone', @$finalll->phone)}}
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
