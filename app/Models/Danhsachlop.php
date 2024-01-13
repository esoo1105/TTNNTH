<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Duan
 * 
 * @property int $id
 * @property string $ten_khoahoc
 * @property Carbon $create_at
 * @property string|null $create_by
 * @property int $id_loaidanhmuc
 * @property int $id_lichhoc
 * @property string $diadiem
 * @property string $anh_bia
 * @property Carbon|null $ngay_hoc
 * @property string|null $noidung
 *
 * @package App\Models
 */
class Danhsachlop extends Model
{
    protected $table = 'danhsachlops';
    public $timestamps = false;

    protected $fillable = [
        'hoten',
        'mssv',
        'lop',
        'email',
        'sdt',
        'ma_khoahoc',
    ];

}
