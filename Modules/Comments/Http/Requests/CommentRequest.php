<?php

namespace Modules\Comments\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u|string|min:5|max:255',
            'post_id' => 'nullable|exists:posts,id'
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'هذا الحقل مطلوب',
            'comment.min' => 'يجب كتابه اكتر من حرفين كحد ادني',
            'comment.max' => 'لقد وصلت الي الحد  الاقصي من الحروف',
            'comment.string' => 'يجب ادخال المدخل بشكل صحيح',
            'comment.regex' => 'يجب الادخال بشكل صحيح',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
