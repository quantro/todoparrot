@extends('layouts.master')

@section('content')

<div class="col-md-12">
<h1>Your Lists</h1>
 <p>
      <a href="/lists/create">Create a list</a>
    </p>

  @if (count($lists) > 0)
      @foreach ($lists as $list)      
      <p>
        <strong><a href="{{ URL::to('lists/' . $list->id) }}">{{ $list->name }}</a></strong><br />
        {{ $list->description }}<br />
        {{ $list->tasks()->count() }} tasks remaining
       </p>
      @endforeach
    @else
     <p>
      You haven't created any lists. No time like now! <a href="/lists/create">Create a list</a>
    </p>  
    @endif

</div>

@stop
