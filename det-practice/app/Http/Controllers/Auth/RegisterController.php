namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Nguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'hovaten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:nguoidung',
            'matkhau' => 'required|string|min:6|confirmed',
        ]);

        $user = Nguoidung::create([
            'hovaten' => $request->hovaten,
            'email' => $request->email,
            'matkhau' => Hash::make($request->matkhau),
            'vaitro' => 'user',
            'trangthai' => 'active',
        ]);

        Auth::login($user);

        return redirect()->route('practice.types');
    }
}