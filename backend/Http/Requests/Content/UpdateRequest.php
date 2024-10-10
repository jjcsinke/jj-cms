<?php

namespace JJCS\CMS\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JJCS\CMS\Enums\ContentType;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
       return [
           'slug' => [
               'string',
               'min:4',
               'max:128',
               Rule::unique('contents')->ignore($this->route('content')->id)
           ],
           'type' => [
               'required',
               Rule::enum(ContentType::class)
           ]
       ];
    }
}
