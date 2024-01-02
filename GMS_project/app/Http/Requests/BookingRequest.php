<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
        return [
            'booking_date' => 'required',
            'booking_time' => 'required',
            'booking_note',
            'service_type'=> 'required',
        ];
    }

    public function messages() {
        return [
            'booking_date.required' => 'Vui lòng chọn :attribute',
            'service_type.required' => 'Vui lòng chọn :attribute',
            'service_time.required' => 'Vui lòng chọn :attribute',
        ];
    }

    public function attributes(){
        return [
            'booking_date' => 'Mgày hẹn dịch vụ',
            'service_type' => 'loại dịch vụ',
            'service_time' => 'thời gian hẹn',
        ];
    }
    protected function withValidator($validator) {
        $validator->after(function ($validator) {
            if ($validator->errors()->count()>0) {
                $validator->errors()->add('msg', 'Vui lòng kiểm tra lại dữ liệu');
            }
        });
}
}
