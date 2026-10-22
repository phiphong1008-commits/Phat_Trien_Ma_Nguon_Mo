namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Nguoidung;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = Nguoidung::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Nếu tài khoản đã tồn tại, cập nhật google_id
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => $user->email_verified_at ?? now(),
                ]);
            } else {
                // Tạo tài khoản mới từ Google
                $user = Nguoidung::create([
                    'hovaten' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'matkhau' => null, // Không có mật khẩu ban đầu
                    'vaitro' => 'user',
                    'trangthai' => 'active',
                    'email_verified_at' => now(),
                ]);
            }

            if ($user->trangthai === 'locked') {
                return redirect()->route('login')->withErrors(['email' => 'Tài khoản của bạn đã bị khóa.']);
            }

            Auth::login($user);
            return redirect()->route('practice.types');

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Đăng nhập bằng Google thất bại, vui lòng thử lại!']);
        }
    }
}