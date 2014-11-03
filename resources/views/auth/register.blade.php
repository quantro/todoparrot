@extends('layouts.master')

@section('content')
<div class="col-md-6">
{!! Form::open(array('route' => 'signup', 'class' => 'form')) !!}
    
<h1>Create a TODOParrot Account</h1>

<p>
Creating a TODOParrot account is free and easy. Once created, you'll be able to manage personal TODO lists and be more productive than ever!
</p>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
 
<div class="form-group">
    {!! Form::label('Your First Name') !!}
    {!! Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>'First Name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your Last Name') !!}
    {!! Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) !!}
</div>
<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) !!}
</div>
<div class="form-group">
    {!! Form::label('Your Password') !!}
    {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
</div>
<div class="form-group">
    {!! Form::label('Confirm Password') !!}
    {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) !!}
</div>
 
<div class="form-group">
    {!! Form::submit('Create My Account!', array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div>
@stop
