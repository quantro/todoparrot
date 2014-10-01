<?php namespace App\Http\Requests;
     
use Illuminate\Foundation\Http\FormRequest;
use Response;
 
class TaskCreateFormRequest extends FormRequest {
 
    public function rules()
    {
        return [
          'name' => 'required',
          'due' => 'required'
        ];
    }
    
    public function authorize()
    {
      return true;
    }

}
