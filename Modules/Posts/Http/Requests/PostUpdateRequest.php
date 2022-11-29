<?php

namespace Modules\Posts\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:200|string|regex:/^[A-Za-z-أ-ي-pL\s\-]+$/u|max:255|unique:posts,title,' . $this->id,
            'image' => 'nullable|image|mimes:jpeg,bmp,png|max:4096',
            'content'=> 'required|string|min:20',
            'author_id'=> 'nullable|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'هذا الحقل مطلوب',
            'title.min' => 'يجب ادخال اكتر من حرفين في هذا الحقل',
            'title.string' => 'يجب ان يكون المدخل نص',
            'title.regex' => 'يجب الادخال بشكل صحيح',
            'title.max' => 'لقد وصلت الي الحد الاقصي من الحروف',
            'title.unique' => 'هذا البوست مسجل من قبل',

            'image.required' => 'هذا الحقل مطلوب',
            'image.max' => 'حجم الصوره كبير جدا',
            'image.image' => 'يجب ادخال صوره فقط',
            'image.mimes' => 'يجب ادخال امتداد من نوع jpeg,bmp,png فقط',

            'content.required' => 'هذا الحقل مطلوب',
            'content.string' => 'يجب الادخال بشكل صحيح',
            'content.min' => 'يجب ان يكون المدخل اكتر من 20 حرف',


            'author.exists' => 'هذا المستخدم غير موجود على النظام',


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
