<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lanthi extends Model
{
    protected $table = 'lanthi';

    protected $primaryKey = 'id';

    const CREATED_AT = 'ngaytao';
    const UPDATED_AT = null;

    protected $fillable = [
        'nguoidung_id',
        'dethi_id',
        'dokho_hientai',
        'batdau',
        'ketthuc',
        'trangthai',
        'literacy',
        'comprehension',
        'conversation',
        'production',
        'tongdiem',
    ];

    protected $casts = [
        'batdau' => 'datetime',
        'ketthuc' => 'datetime',
        'ngaytao' => 'datetime',
        'dokho_hientai' => 'decimal:2',
        'tongdiem' => 'integer',
    ];

    public function cauHoi(): HasMany
    {
        return $this->hasMany(
            Lanthicauhoi::class,
            'lanthi_id',
            'id'
        );
    }
}
