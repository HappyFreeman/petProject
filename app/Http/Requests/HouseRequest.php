<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool //Определите, авторизован ли пользователь для выполнения этого запроса.
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // https://laravel.com/docs/11.x/validation#available-validation-rules
            'name' => 'required',
            'area' => 'required|integer',
            'days' => 'required|integer',
            'image' => ['sometimes', 'nullable', 'image'],
            'images.*' => ['sometimes', 'nullable', 'image'],
        ];
    }

    /*
    public function validated($key = null, $default = null)
    { // https://laravel.com/docs/11.x/validation#form-request-validation

        $house = parent::validated();
        $house['area'] = isset($house['area']) ? 12 : 14;
        //dd($house);
        return $house;
    }
    */
    /*
    protected function prepareForValidation()
    {
        $this->merge([
            'area' => $this->has('area'), // 
        ]);
    }
    */
}
