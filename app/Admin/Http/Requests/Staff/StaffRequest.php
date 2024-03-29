<?php

namespace App\Admin\Http\Requests\Staff;

use App\Admin\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\Staff\{StaffRoles, StaffGender};

class StaffRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'username' => [
                'required',
                'string', 'min:6', 'max:50',
                'unique:App\Models\Staff,username',
                'regex:/^[A-Za-z0-9_-]+$/',
                function ($attribute, $value, $fail) {
                    if (in_array(strtolower($value), ['admin', 'user', 'password'])) {
                        $fail('The '.$attribute.' cannot be a common keyword.');
                    }
                },
            ],
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'gender' => ['required', new Enum(StaffGender::class)],
            'password' => ['required', 'string', 'confirmed'],
            'roles' => ['required', new Enum(StaffRoles::class)],
            'birthday' => ['required', 'date_format:Y-m-d']
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\User,id'],
            'username' => [
                'required',
                'string', 'min:6', 'max:50',
                'unique:App\Models\Staff,username,'.$this->id,
                'regex:/^[A-Za-z0-9_-]+$/',
                function ($attribute, $value, $fail) {
                    if (in_array(strtolower($value), ['admin', 'user', 'password'])) {
                        $fail('The '.$attribute.' cannot be a common keyword.');
                    }
                },
            ],
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'gender' => ['required', new Enum(StaffGender::class)],
            'password' => ['nullable', 'string', 'confirmed'],
            'roles' => ['required', new Enum(StaffRoles::class)],
            'birthday' => ['required', 'date_format:Y-m-d']
        ];
    }
}
