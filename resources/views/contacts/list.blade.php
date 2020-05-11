@extends('layouts.app')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading"></h4>
    <p>{{session('success')}}</p>
    <p class="mb-0"></p>
</div>
@endif
<a href="{{url('contacts/create')}}" class="btn btn-primary mb-3">Add a new contact </a>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>contact</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td scope="row">{{$contact->name}} </td>
            <td scope="row">
                @foreach($contact->phones as $phone )
                {{$phone->mobilenumber}}</br>
                @endforeach
            </td>

            <td><a class="btn btn-info" href="{{route('contacts.edit',$contact->id)}} ">Edit</a></td>
            <td>
                {{ Form::open(array('url' => 'contacts/' . $contact->id)) }}
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