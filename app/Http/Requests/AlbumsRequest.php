<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        return [
            'title' => 'required|min:1|max:50',
            'name' => 'required|min:1|max:50',
            'description' => 'required|min:0|max:500'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Поле "Название альбома" является обязательным.',
            'name.required' => 'Поле "Имя исполнителя" является обязательным.',
            'description.required' => 'Поле "Описание альбома" является обязательным.'
        ];
    }
}
