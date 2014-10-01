<?php namespace App\Http\Requests;
     
use Illuminate\Foundation\Http\FormRequest;
use Response;
 
class UserFormRequest extends FormRequest {
 
    public function rules()
    {
        return [
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email',
          'password' => 'required|min:8'
        ];
    }
    
    public function authorize()
    {
      return true;
    }

}
