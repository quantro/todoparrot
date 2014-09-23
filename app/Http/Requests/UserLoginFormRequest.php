<?php namespace todoparrot\Http\Requests;
     
use Illuminate\Foundation\Http\FormRequest;
use Response;
 
class UserLoginFormRequest extends FormRequest {
 
    public function rules()
    {
        return [
          'email' => 'required|email',
          'password' => 'required|min:8'
        ];
    }
    
    public function authorize()
    {
      return true;
    }

}
