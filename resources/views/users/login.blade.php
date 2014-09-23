@extends('layouts.master')

@section('content')
<div class="col-md-6">
{!! Form::open(array('route' => 'login', 'class' => 'form')) !!}
    
<h2>Sign In to Your TODOParrot Account</h2>

<p>
Sign in to your TODOParrot account to continue maximizing your productivity!
</p>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
 
<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) !!}
</div>
<div class="form-group">
    {!! Form::label('Your Password') !!}
    {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
</div>
 
<div class="form-group">
    {!! Form::submit('Login', array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div>
@stop
