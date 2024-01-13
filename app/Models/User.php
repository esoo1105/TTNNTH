<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\ChucVu;

/**
 * Class User
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property int $chucvu
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $update_by
 * @property string|null $delete_by
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;

    protected $casts = [
        'chucvu' => ChucVu::class,
    ];
    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'username',
        'password',
        'name',
        'chucvu',
    ];
}

