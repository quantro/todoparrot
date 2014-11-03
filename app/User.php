<?php namespace todoparrot;

use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Auth\Passwords\CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements UserContract, CanResetPasswordContract {

	use UserTrait, CanResetPasswordTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

  protected $fillable = ['first_name', 'last_name', 'email', 'password'];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

  /*
   * Each user can have one or more lists
   *
   */
  public function lists()
  {
      return $this->hasMany('\todoparrot\Todolist');
  }

  /**
   * Determine whether the user owns a TODO list.
   *
   */
  public function owns($listId)
  {

    $list = \todoparrot\Todolist::find($listId);

    if ($list->user_id == $this->id)
    {
      return true;
    } else {
      return false;
    }

  }

}
