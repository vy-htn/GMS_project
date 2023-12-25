<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'employee_firstname' => 'required|max:10',
            'employee_lastname' => 'required|max:40',
            'employee_gender' => 'required',
            'employee_birthdate' => 'required',
            'employee_department' => 'required',
            'employee_position' => 'required',
            'employee_email' => 'required',
            'employee_phonenumber' => 'required',
            'employee_address' => 'required',
        ];
    }

    public function messages() {
        return [
            'employee_firstname.required' => ':attribute không được bỏ trống',
            'employee_firstname.max' => ':attribute không quá :max kí tự',
            'employee_lastname.required' => ':attribute không được bỏ trống',
            'employee_lastname.max' => ':attribute không quá :max kí tự',
            'employee_gender.required' => ':attribute không được bỏ trống',
            'employee_birtdate.required' => ':attribute không được bỏ trống',
            'employee_department.required' => ':attribute không được bỏ trống',
            'employee_position.required' => ':attribute không được bỏ trống',
            'employee_email.required' => ':attribute không được bỏ trống',
            'employee_phonenumber.required' => ':attribute không được bỏ trống',
            'employee_phonenumber.integer' => ':attribute phải là số',
            'employee_address.required' => ':attribute không được bỏ trống',
        ];
    }

    public function attributes(){
        return [
            'employee_firstname' => 'Họ',
            'employee_lastname' => 'Tên và tên đệm',
            'employee_birthdate' => 'Ngày sinh',
            'employee_gender' => 'Giới tính',
            'employee_department' => 'Bộ phận làm việc',
            'employee_position' => 'Vị trí làm việc',
            'employee_email' => 'Email',
            'employee_phonenumber' => 'Số điện thoại',
            'employee_address' => 'Địa chỉ',
        ];
    }

    protected function withValidator($validator) {
            $validator->after(function ($validator) {
                if ($validator->errors()->count()>0) {
                    $validator->errors()->add('msg', 'Vui lòng kiểm tra lại dữ liệu');
                }
            });
    }

    protected function prepareForValidation() {
        $this->merge([
            
        ]);
    }

}
