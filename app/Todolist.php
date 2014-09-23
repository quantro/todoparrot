<?php namespace todoparrot;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model {

  protected $table = 'todolists';

	protected $fillable = ['name', 'description'];

  public function user()
  {
      return $this->belongsTo('\todoparrot\User');
  }

  public function tasks()
  {
    return $this->hasMany('\todoparrot\Task');
  }

}
