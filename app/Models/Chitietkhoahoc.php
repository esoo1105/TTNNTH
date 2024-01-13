<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChitietBatdongsan
 * 
 * @property int $id
 * @property string|null $noidung
 * @property int $id_bds
 * @property int $gia_dukien
 * @property int $id_chudautu
 * @property string $diadiem
 * @property string|null $created_by
 * @property Carbon $created_at
 * @property string|null $update_by
 * @property int $phongngu
 * @property int $nhavesinh
 * @property int $dientich_nha
 * @property int $ham_dexe
 * @property int $sotang
 * @property int $dientich_dat
 * @property int $id_huyen
 * @property string|null $anhchitiet
 * 
 * @property Khoahoc $khoahoc

 * @package App\Models
 */
class Chitietkhoahoc extends Model
{
    protected $table = 'chitietkhoahocs';
    public $timestamps = false;

    protected $casts = [
        'ma_khoahoc' => 'string',
        'thoigian_hoc' => 'string',
        'sotiet' => 'int',
        'diadiemhoc' => 'string',
        'thuhoc' => 'int',
        'hocphi' => 'int',
        'id_giangvien' => 'int',
        'loailop' => 'string',
    ];

    protected $fillable = [
        'ma_khoahoc',
        'thoigian_hoc',
        'sotiet',
        'diadiemhoc',
        'thu_hoc',
        'id_giangvien',
        'loai_lop',
        'hocphi',
        'mota',
    ];

    public function khoahoc()
    {
        return $this->belongsTo(Khoahoc::class, 'ma_khoahoc');
    }

}
