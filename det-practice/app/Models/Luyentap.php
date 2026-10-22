namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luyentap extends Model
{
    use HasFactory;

    protected $table = 'luyentap';
    public $timestamps = false; // Do dùng cột ngaylam thay cho timestamps mặc định

    protected $fillable = [
        'nguoidung_id',
        'cauhoi_id',
        'noidung',
        'luachon_id',
        'audio',
        'ladung',
        'diem',
        'trangthai_ai',
        'diem_ai',
        'nhanxet_ai',
        'thoigianlam',
    ];

    public function nguoidung()
    {
        return $this->belongsTo(Nguoidung::class, 'nguoidung_id');
    }

    public function cauhoi()
    {
        return $this->belongsTo(Question::class, 'cauhoi_id');
    }
}