@extends('layouts.app')
@section('content')
<a href="{{url('phones/create')}}" class="btn btn-primary mb-3">Add a new phone </a>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>phone</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($phones as $phone)
        <tr>
            <td scope="row">{{$phone->mobilenumber}} </td>
            <td><a class="btn btn-info" href="{{route('phones.edit',$phone->id)}} ">Edit</a></td>
            <td>
                {{ Form::open(array('url' => 'phones/' . $phone->id)) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
            <!-- <td><a class="btn btn-danger">Delete</a></td> -->
        </tr>
        @endforeach

    </tbody>
</table>



@endsection