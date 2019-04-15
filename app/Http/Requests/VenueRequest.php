<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VenueRequest extends FormRequest
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
            'name' => 'required|string:max:255|min:2',
            'district' => 'required|string:max:20|min:2',
            'status' => 'required|int',
            'description' => 'required|string|min:5',
            'province' => 'required|string:max:32',
            'city' => 'required|string:max:20|min:2',
            'street' => 'required|string:max:20|min:2',
//            'cover_uri' => 'required|string:max:255|min:2',
            'start_at' => 'required|string:max:64|min:2',
            'end_at' => 'required|string:max:64|min:2',
            'phone' => 'required|string:max:32|min:2',
            'venue_place_list' => 'required|string:max:255|min:2',  // 1号场
        ];
    }
}
