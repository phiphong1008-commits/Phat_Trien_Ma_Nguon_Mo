namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhdau extends Model
{
    use HasFactory;

    protected $table = 'danhdau';
    public $timestamps = false;

    protected $fillable = [
        'nguoidung_id',
        'cauhoi_id',
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