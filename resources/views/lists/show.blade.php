@extends('layouts.master')

@section('content')

<h1>{{ $list->name }}</h1>

<p>
Created on: {{ $list->created_at }} Last modified: {{ $list->updated_at }}<br />
{{ $list->description }}
</p>

<h3>Tasks</h3>

@if($list->tasks->count() == 0)

<p>
No tasks assigned to this list. <a href="{{ URL::route('lists.tasks.create', [$list->id]) }}">Add a task</a>.
</p>

@else

  <div class="table-responsive">
    <table class="table">
      @foreach ($list->tasks as $task)      
      <tr>
        <td>
        @if($task->done)
          <del><a href="{{ URL::route('lists.tasks.show', [$list->id, $task->id]) }}">{{ $task->name }}</a></del>
        @else
          <a href="{{ URL::route('lists.tasks.show', [$list->id, $task->id]) }}">{{ $task->name }}</a>
        @endif
        </td>
        <td style="text-align: right;">

          <div style="float: right; padding-right: 5px;">
            {!! Form::open(array('route' => array('lists.tasks.destroy', $list->id, $task->id), 'method' => 'delete')) !!}
                  <button type="submit" href="{{ URL::route('lists.tasks.destroy', [$list->id, $task->id]) }}" class="glyphicon glyphicon-remove" title="Delete task"></button>
              {!! Form::close() !!}
          </div>

          <div style="float: right; padding-right: 5px;">
              {!! Form::open(array('route' => array('complete_task', $list->id, $task->id), 'method' => 'post')) !!}

                  @if($task->done)
                  <button type="submit" href="{{ URL::route('complete_task', [$list->id, $task->id]) }}" class="glyphicon glyphicon-repeat" title="Undo"></button>
                  @else
                  <button type="submit" href="{{ URL::route('complete_task', [$list->id, $task->id]) }}" class="glyphicon glyphicon-ok" title="Mark complete"></button>
                  @endif
              {!! Form::close() !!}
          </div>

          <div style="float: right; padding-right: 5px;">
          {!! Form::open(array('route' => array('lists.tasks.edit', $list->id, $task->id), 'method' => 'get')) !!}
                  <button type="submit" href="{{ URL::route('lists.tasks.edit', [$list->id, $task->id]) }}" class="glyphicon glyphicon-pencil" title="Edit Task"></button>
              {!! Form::close() !!}
          </div>

        </td>
      </tr>
      @endforeach
    </table>
  </div>

<p>
<a href="{{ URL::route('lists.tasks.create', [$list->id]) }}" class='btn btn-primary'>Add a task</a>
</p>

@endif

@stop
