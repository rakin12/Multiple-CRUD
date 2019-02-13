@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width: 130%">
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

                    <a href="{{route('finalls.create')}}" class="btn btn-primary">Add New User</a><br>
                    @if(@$finalls)
                    <table class="table table-bordered" style="width: 100%">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date Of Birth</th>
                            <th>Phone</th>
                            <th></th><th></th>
                        </tr>
                        @foreach(@$finalls as $finall)
                            <tr>
                                <td>{{@$finall->name}}</td>
                                <td>{{@$finall->email}}</td>
                                <td>{{@$finall->address}}</td>
                                <td>{{@$finall->dateOfBirth}}</td>
                                <td>{{@$finall->phone}}</td>
                                <td><button class="btn btn-default"><a href="{{route('finalls.edit',$finall->id)}}">Update</button></td>
                                <td>
                                     <form action="{{route('finalls.destroy',@$finall->id) }}" method="post">
                                        <input class="btn btn-default" type="submit"    value="Delete" />
                                        <input type="hidden" name="_method" value="delete" />
                                        {!! csrf_field() !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                        
                    @else
                    <p>asd</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
