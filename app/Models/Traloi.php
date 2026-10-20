<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Traloi extends Model
{
    protected $table = 'traloi';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'lanthicauhoi_id',
        'noidung',
        'luachon_id',
        'audio',
        'ladung',
        'diem',
        'trangthai_ai',
        'diem_ai',
        'nhanxet_ai',
    ];

    protected $casts = [
        'diem' => 'decimal:2',
        'diem_ai' => 'decimal:2',
        'thoigian' => 'datetime',
    ];

    public function lanThiCauHoi(): BelongsTo
    {
        return $this->belongsTo(
            Lanthicauhoi::class,
            'lanthicauhoi_id',
            'id'
        );
    }
}
