<?php

namespace JJCS\CMS\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JJCS\CMS\Enums\ContentType;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => [
                'sometimes',
                Rule::enum(ContentType::class)
            ]
        ];
    }

    protected function passedValidation()
    {
        $this->type = ContentType::tryFrom($this->type);
    }
}
