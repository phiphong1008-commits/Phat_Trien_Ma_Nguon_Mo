namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'hovaten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:nguoidung,email',
            'matkhau' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'hovaten.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Định dạng email không hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',
            'matkhau.required' => 'Vui lòng nhập mật khẩu.',
            'matkhau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'matkhau.confirmed' => 'Xác nhận mật khẩu không trùng khớp.',
        ];
    }
}