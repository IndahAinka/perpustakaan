<?php

namespace App\Http\Requests;

// use Clockwork\Request\Request;
// use Clockwork\Request\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KategoriUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
        // dd($this->all());

        return [
            'kode' => 'required',Rule::unique('kategoris')->ignore($this->id),
            // 'kode' => 'required|max:10|min:3|unique:kategoris,kode,'.$this->id.'id','deleted_at','NULL',
            'nama' => 'required'
        ];
    }
}
