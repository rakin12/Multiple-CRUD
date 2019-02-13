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

                    <a href="{{route('finallls.create')}}" class="btn btn-primary">Add New User</a><br>
                    @if(@$finallls)
                    <table class="table table-bordered" style="width: 100%">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date Of Birth</th>
                            <th>Phone</th>
                            <th></th><th></th>
                        </tr>
                        @foreach(@$finallls as $finalll)
                            <tr>
                                <td>{{@$finalll->name}}</td>
                                <td>{{@$finalll->email}}</td>
                                <td>{{@$finalll->address}}</td>
                                <td>{{@$finalll->dateOfBirth}}</td>
                                <td>{{@$finalll->phone}}</td>
                                <td><button class="btn btn-default"><a href="{{route('finallls.edit',$finalll->id)}}">Update</button></td>
                                <td>
                                     <form action="{{route('finallls.destroy',@$finalll->id) }}" method="post">
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
