<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules          = [
            'hire_date'         => 'sometimes|date_format:"Y-m-d"',
            'start_date'        => 'sometimes|date_format:"Y-m-d'
        ];

        switch ($this->method())
        {
            case 'PATCH':
                $user = User::find(request()->id);

                $rules['username']          = [
                    'required',
                    Rule::unique('users')->ignore($user->id)->where(function ($query)
                    {
                        $query->where('username', request()->username);
                    })
                ];

                $rules['email']             = [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user->id)->where(function ($query)
                    {
                        $query->where('email', request()->email);
                    })
                ];

                if (request()->password)
                {
                    $rules['password']          = [
                        'string', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]'
                    ];
                }
            break;

            default:
                $rules['username']          = 'required|unique:users,username';
                $rules['email']             = 'required|unique:users,email';
                $rules['password']          = ['required','min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]'];
            break;
        }
    }

    public function messages()
    {
        return [
            'hire_date.date_format'         => 'Hire date must be in Year-month-day format.'
        ];
    }
}
