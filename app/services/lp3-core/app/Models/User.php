<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Services\Lp3Core\Database\Factories\UserFactory;

/**
 * ユーザーモデル
 *
 * @property int id
 * @property string name
 */
class User extends Model implements
    \Illuminate\Contracts\Auth\Access\Authorizable,
    \Illuminate\Contracts\Auth\Authenticatable,
    \Illuminate\Contracts\Auth\CanResetPassword
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
    use HasApiTokens, HasFactory, Notifiable;

    // @todo usersテーブルにソフトデリート用のカラムを追加したら復帰させる
    // use SoftDeletes;

    // @todo 作成ユーザー、更新ユーザーを保存できるようにする
    // use AuthorObservable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @see HasFactory::newFactory()
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    public function yardGroupStaffs()
    {
        return $this->belongsToMany(User::class, 'yard_group_staff', 'user_id', 'yard_group_id')->withTimestamps();
    }

    public function yardGroupManagers()
    {
        return $this->belongsToMany(User::class, 'yard_group_manager', 'user_id', 'yard_group_id')->withTimestamps();
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
}
