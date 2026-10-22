namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'matkhau' => 'required',
        ]);

        // Đăng nhập dựa trên bảng nguoidung và cột mật khẩu là matkhau
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['matkhau']])) {
            $user = Auth::user();
            if ($user->trangthai === 'locked') {
                Auth::logout();
                return back()->withErrors(['email' => 'Tài khoản của bạn đã bị khóa.']);
            }
            
            $request->session()->regenerate();
            return redirect()->intended(route('practice.types'));
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}