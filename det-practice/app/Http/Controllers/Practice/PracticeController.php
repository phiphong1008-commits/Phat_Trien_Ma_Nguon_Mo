namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use App\Models\PracticeAttempt;
use App\Services\ScoringService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{
    protected $scoringService;

    public function __construct(ScoringService $scoringService)
    {
        $this->scoringService = $scoringService;
    }

    public function types()
    {
        return view('practice.types');
    }

    public function select($typeId)
    {
        return view('practice.select', compact('typeId'));
    }

    public function show($questionId)
    {
        // Giả lập đối tượng câu hỏi mẫu để hiển thị
        $question = (object)[
            'id' => $questionId,
            'dap_an' => 'Apple'
        ];

        return view('practice.show', compact('question'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'cauhoi_id' => 'required|integer',
            'cautraloi' => 'required|string',
            'dap_an_dung' => 'required|string',
        ]);

        $question = (object)['dap_an' => $request->dap_an_dung];
        $isCorrect = $this->scoringService->scoreAuto($question, $request->cautraloi);

        $attempt = PracticeAttempt::create([
            'nguoidung_id' => Auth::id(),
            'cauhoi_id' => $request->cauhoi_id,
            'cautraloi' => $request->cautraloi,
            'is_correct' => $isCorrect,
            'diem' => $isCorrect ? 10 : 0,
        ]);

        return redirect()->route('practice.result', $attempt->id);
    }

    public function result($attemptId)
    {
        $attempt = PracticeAttempt::findOrFail($attemptId);
        return view('practice.result', compact('attempt'));
    }

    public function toggleBookmark(Request $request)
    {
        $request->validate(['cauhoi_id' => 'required|integer']);
        
        \App\Models\Danhdau::firstOrCreate([
            'nguoidung_id' => Auth::id(),
            'cauhoi_id' => $request->cauhoi_id,
        ]);

        return back()->with('success', 'Đã đánh dấu câu hỏi thành công!');
    }
}