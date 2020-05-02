@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">
        {!! Form::open(['route' => 'phones.store']) !!}
        <div class="form-group">
            <label for="phone">phone</label>
            {!! Form::text('phone', '01009825243',['class' => 'form-control']);!!}
        </div>


        {!! Form::submit('sumbit',['class' => 'btn btn-primary']); !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection