<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTenant extends FormRequest
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
        $id = $this->segment(3);

        $rules =    [

                        'title' => ['required', 'string', 'max:255', "unique:tenants,title,{$id},id"],
                        'price' => "required|regex:/^\d+(\. \d{1,2})?$/",
                        'description' => ['required', 'min:3', 'max:255'],
                        'image' => ['required', 'image'],



                    ];

                    if($this->method() == 'PUT'){
                        $rules['logo'] =  ['nullable', 'logo'];


                    }
                    return $rules;


    }
}
