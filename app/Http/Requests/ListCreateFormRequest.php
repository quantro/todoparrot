<?php namespace todoparrot\Http\Requests;
     
use Illuminate\Foundation\Http\FormRequest;
use Response;
 
class ListCreateFormRequest extends FormRequest {
 
    public function rules()
    {
        return [
          'name' => 'required',
          'description' => 'required'
        ];
    }
    
    public function authorize()
    {
      return true;
    }

}
