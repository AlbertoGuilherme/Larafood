<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);
        return [
            'name' => "required | min:3| max:1000|unique:products,name,{$id},id",
            'description' => 'required|min:3| max: 1000',
            'photo' => 'nullable|image'
        ];
    }

    public function messages()
  {
      return
    [
    //   'name.required' => 'Nome e obrigatorio',
    //   'name.min' => 'Nome precisa receber pelo menos 3 carateres',
    //   'description.min' => 'Descricao precisa receber pelo menos tres caratere',
    //   'description.required' => 'Descricao e o obrigatorio ',
    //   'name.unique' => 'O nome ja existe',

    ];
  }
}
