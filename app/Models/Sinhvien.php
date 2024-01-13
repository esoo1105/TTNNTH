<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;



/**
 * Class User
 *
 * @property int $mssv
 * @property string $hoten
 * @property string $lop
 * @property string $noisinh
 * @property string $sdt
 * @property string $email
 * @property int $chucvu
 * @property Carbon $created_at
 
 * @package App\Models
 */
class Sinhvien extends Model
{

    protected $table = 'sinhviens';
    public $timestamps = false;

    protected $fillable = [
        'mssv',
        'hoten',
        'ngaysinh',
        'thoigian_dangky',
        'sotien_dadong',
        'lop',
        'noisinh',
        'sdt',
        'email',
        'ma_khoahoc'
    ];
}

