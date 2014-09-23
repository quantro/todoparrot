<?php namespace todoparrot;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

  protected $table = 'tasks';
	protected $fillable = ['name', 'due', 'done'];

}
