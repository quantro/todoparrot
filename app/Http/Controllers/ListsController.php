<?php namespace todoparrot\Http\Controllers;

use Illuminate\Routing\Controller;
use todoparrot\Http\Requests\ListCreateFormRequest;

class ListsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /lists
	 *
	 * @return Response
	 */
	public function index()
	{

    if (\Auth::check()) {

        $id = \Auth::id();

        // Retrieve the user's lists, ordered by creation date descending 
        $lists = \todoparrot\User::find($id)->lists()->orderBy('created_at', 'desc')->get();
     
        return View('lists.index')->with('lists', $lists);

    } else {

    return \Redirect::route('login')->with('message', 'Please login!');

    }
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /lists/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lists.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /lists
	 *
	 * @return Response
	 */
	public function store(ListCreateFormRequest $request)
  {

    $list = new \todoparrot\Todolist(array(
      'name' => \Input::get('name'),
      'description' => \Input::get('description')
    ));

    $user = \todoparrot\User::find(\Auth::id());
    
    $list = $user->lists()->save($list);

    return \Redirect::route('lists.show', array($list->id))->with('message', 'Your list has been created!');

	}

	/**
	 * Display the specified resource.
	 * GET /lists/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
  {
    $list = \todoparrot\Todolist::find($id);
    return View('lists.show')->with('list', $list);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /lists/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /lists/{id}
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
	 * DELETE /lists/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
