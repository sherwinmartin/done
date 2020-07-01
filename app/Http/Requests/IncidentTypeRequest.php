<?php

namespace App\Http\Requests;

use App\IncidentType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IncidentTypeRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'PATCH':
                $incident_type = IncidentType::find(request()->id);

                $rules['name'] = [
                    'required',
                    Rule::unique('incident_types')->ignore($incident_type->id)
                        ->where(function ($query)
                        {
                            $query->where('name', request()->name);
                        })
                ];
            break;

            default:
                $rules['name'] = 'required|unique:incident_types,name';
            break;
        }
        return $rules;
    }
}
