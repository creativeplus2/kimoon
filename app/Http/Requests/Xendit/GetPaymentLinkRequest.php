<?php

namespace App\Http\Requests\Xendit;

use App\Services\XenditService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GetPaymentLinkRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $xenditService = new XenditService();

        return [
            'c' => 'required|exists:members,kode_member',
            'm' => 'required|in:' . join(',', $xenditService->getAllPaymentMethods())
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return abort(403);
    }
}
