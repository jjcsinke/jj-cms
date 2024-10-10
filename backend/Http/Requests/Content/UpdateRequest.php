<?php

namespace JJCS\CMS\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use JJCS\CMS\Enums\ContentType;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();

        dump($user->permissions->toArray());
        return Auth::user()->can('update', $this->route('content'));
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
