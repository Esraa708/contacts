@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">

        {!! Form::model($user,array('route' => ['users.update',$user->id],'method' => 'PUT')) !!}
        <div class="form-group">
            <label for="address">Address</label>
            {!! Form::text('address',null,['class' => 'form-control']);!!}
        </div>


        {!! Form::submit('sumbit',['class' => 'btn btn-primary']) ;!!}
        {!! Form::close() !!}
    </div>
</div>
@endsection