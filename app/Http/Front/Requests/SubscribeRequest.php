<?php

namespace App\Http\Front\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['email'],
        ];
    }
}
