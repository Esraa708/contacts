@extends('layouts.app')
@section('content')
<div class="row">

    <div class="col-md-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!! Form::open(['route' => 'phones.store']) !!}
        <div class="form-group">
            <label for="phone">phone</label>
            {!! Form::text('mobilenumber', '01009825243',['class' => 'form-control']);!!}
        </div>


        {!! Form::submit('sumbit',['class' => 'btn btn-primary']); !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection