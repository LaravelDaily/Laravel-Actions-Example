<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('delete', $this->team);
    }
}
