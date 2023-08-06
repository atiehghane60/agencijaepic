<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class SchedulerManualAddRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:activities|max:255',
            'appointments.*' => 'required|date_format:Y-m-d H:i'
        ];
    }

    public function prepareForValidation()
    {
        if ($this->has('appointments')) {
            $appointmentsInString = preg_split("/\r\n/", $this->appointments);
            $this->merge(['appointments' => $appointmentsInString]);
        }
    }
}
