<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCandidateApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:100'],
            'gender' => ['required', Rule::in(['Pria', 'Wanita'])],
            'pob' => ['required', 'string', 'max:100'],
            'dob' => ['required', 'date', 'before:today'],
            'marital_status' => ['required', Rule::in(['Belum Menikah', 'Menikah', 'Cerai', 'Janda/Duda'])],
            'blood_type' => ['required', Rule::in(['A', 'B', 'AB', 'O'])],
            'address_ktp' => ['required', 'string'],
            'province_ktp' => ['nullable', 'string', 'max:100'],
            'city_ktp' => ['nullable', 'string', 'max:100'],
            'postal_code_ktp' => ['nullable', 'string', 'max:10'],
            'address_current' => ['required', 'string'],
            'province_current' => ['nullable', 'string', 'max:100'],
            'city_current' => ['nullable', 'string', 'max:100'],
            'postal_code_current' => ['nullable', 'string', 'max:10'],
            'religion' => ['required', 'string', 'max:100'],
            'ethnic' => ['required', 'string', 'max:100'],
            'ktp_number' => ['required', 'digits_between:12,20', Rule::unique('candidates', 'ktp_number')],
            'kk_number' => ['required', 'digits_between:12,20'],
            'sim_c' => ['nullable', 'string', 'max:50'],
            'sim_a_b' => ['nullable', 'string', 'max:50'],
            'weight' => ['required', 'numeric', 'min:1', 'max:500'],
            'height' => ['required', 'numeric', 'min:1', 'max:300'],
            'facebook' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'position_id' => ['required', 'exists:positions,id'],
        ];
    }
}
