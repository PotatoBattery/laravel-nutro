<?php

namespace App\Http\Requests\Nutro;

use Illuminate\Foundation\Http\FormRequest;

class MusicRequest extends FormRequest
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
        return [
            'file' => 'required|mimes:mpeg,wav,ogg',
            'ruName' => 'required',
            'enName' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ruName.required' => 'Обязательно укажите название аудиофайла на русском языке',
            'enName.required' => 'Обязательно укажите название аудиофайла на английском языке',
            'file.required' => 'Обязательно выберите файл для загрузки',
            'file.mimes' => 'Файл должен быть одного из следующих форматов: mpeg, mpga, mp3, wav, ogg'
        ];
    }
}
