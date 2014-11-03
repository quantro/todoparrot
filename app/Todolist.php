<?php namespace todoparrot;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model {

  protected $table = 'todolists';

	protected $fillable = ['name', 'description'];

  private $rules = [
    'name'        => 'required',
    'description' => 'required'
  ];

  private $errors;

  public function errors()
  {
    return $this->errors;
  }

  public function validate($data)
  {
 
    $validate = \Validator::make($data, $this->rules);

    if ($validate->fails()) {
      $this->errors = $validate->messages();
      return false;
    } else {
      return true;
    }

  }

  /**
   * Each list is owned by a registered user.
   *
   */
  public function user()
  {
      return $this->belongsTo('\todoparrot\User');
  }

  /**
   * Each list can be associated with one or more tasks.
   *
   */
  public function tasks()
  {
    return $this->hasMany('\todoparrot\Task');
  }

  /**
   * Calculate the number of incomplete tasks
   *
   */
  public function remainingTasks()
  {

    $completed = $this->tasks()->where('done', '=', 1)->count();
    $total = $this->tasks()->count();

    return $total - $completed;

  }

}
