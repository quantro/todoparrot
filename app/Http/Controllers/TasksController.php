<?php namespace todoparrot\Http\Controllers;

use Illuminate\Routing\Controller;
use todoparrot\Http\Requests\TaskCreateFormRequest;

class TasksController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /tasks
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tasks/create
	 *
	 * @return Response
	 */
	public function create($listId)
  {
    $list = \todoparrot\Todolist::find($listId);
		return view('tasks.create')->with('list', $list);;
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tasks
	 *
	 * @return Response
	 */
	public function store($listId, TaskCreateFormRequest $request)
  {

    $user = \todoparrot\User::find(\Auth::id());

    if ($user->owns($listId)) {

      $list = \todoparrot\Todolist::find($listId);

      if (\Input::get('done') == 'true')
      {
        $done = 1;
        } else {
          $done = 0;
        }

      $task = new \todoparrot\Task(array(
        'name' => \Input::get('name'),
        'due' => \Input::get('due'),
        'done' => $done
      ));

      $task = $list->tasks()->save($task);

      return \Redirect::route('lists.show', array($list->id))->with('message', 'Your task has been created!');

    } else {
      
      return \Redirect::route('home')->with('message', 'Authorization error: you do not own this list.');

    }

	}

  /**
   * Toggle task completion
   *
   */
  public function complete($listId, $taskId)
  {
    
    $user = \todoparrot\User::find(\Auth::id());
    $list = \todoparrot\Todolist::find($listId);

    if ($user->owns($listId)) {

      $task = $list->tasks()->where('id', '=', $taskId)->first();

      if ($task->done == true)
      {
        $task->done = false;
      } else {
        $task->done = true;
      }

      $task->save();

      return \Redirect::route('lists.show', $list->id)->with('message', 'Task updated!');

    } else {
      return \Redirect::route('home')->with('message', 'Authorization error: you do not own this list.');
    }

  }

	/**
	 * Display the specified resource.
	 * GET /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($listId, $taskId)
  {

    $task = \todoparrot\Task::find($taskId);
    
		return view('tasks.show')->with('task', $task);

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tasks/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
  {
    $task = \todoparrot\Task::find($id);
		return view('tasks.show')->with('task', $task);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
    
      $user = \Auth::user();

      $task = \todoparrot\Task::find($id);

      $list = \todoparrot\Todolist::find($task->todolist_id);

      if ($user->owns($list->id)) {

          $task->delete();

          return \Redirect::route('lists.show', $list->id)->with('message', 'Task deleted!');

      }

	}

}
