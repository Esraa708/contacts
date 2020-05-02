@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">

        {!! Form::model($phone,array('route' => ['phones.update',$phone->id],'method' => 'PUT')) !!}
        <div class="form-group">
            <label for="phone">phone</label>
            {!! Form::text('mobilenumber',null,['class' => 'form-control']);!!}
        </div>


        {!! Form::submit('sumbit',['class' => 'btn btn-primary']) ;!!}
        {!! Form::close() !!}
    </div>
</div>
@endsection