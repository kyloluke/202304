<?php

namespace Services\Lp3Cargo\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Cargo\Database\Factories\ChassisFactory;
use Services\Lp3Cargo\Refers\Models\Office;
use Illuminate\Support\Facades\DB;

/**
 * 車輌モデル
 */
class Chassis extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected $table = 'chassis';
    protected $casts = [
        'displacement' => 'float',
        'weight' => 'float',
        'extent' => 'float',
        'width' => 'float',
        'height' => 'float',
        'm3' => 'float',
        'movable' => 'boolean'
    ];

    protected static function newFactory()
    {
        return ChassisFactory::new();
    }

    // 貨物種別モデルとのリレーション
    public function cargoType()
    {
        return $this->belongsTo(CargoType::class, 'cargo_type_id');
    }

    // 車種モデルとのリレーション
    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function shipper()
    {
        return $this->belongsTo(Office::class, 'shipper_id');
    }

    public function primeForwarder()
    {
        return $this->belongsTo(Office::class, 'prime_forwarder_id');
    }

    public function carryActivities()
    {
        return $this->hasMany(ChassisCarryActivity::class, 'chassis_id');
    }

    // オートインクリメントID取得する
    static public function getIncrementId()
    {
        $res = DB::select('SELECT * FROM chassis_id_seq')[0];
        return $res->is_called ? $res->last_value : $res->last_value - 1;
    }

    public function scopeWhereNumber($query, $number)
    {
        return $query->where('number', 'like', '%' . $number . '%');
    }

    public function scopeWhereYard($query, $yardId)
    {
        $subQ = ChassisCarryActivity::query()
            ->select('chassis_id', DB::raw('MAX(id) as id')) // ここは id か act_at か、どっちのほうが安全
            ->where('prospect', false)
            ->groupBy('chassis_id');

        return $query->whereHas('carryActivities', function ($query) use ($subQ, $yardId) {
            $query
                ->joinSub($subQ, 'done_activities', function ($join) {
                    $join->on('done_activities.id', '=', 'chassis_carry_activities.id');
                })
                ->where('chassis_carry_activities.yard_id', $yardId);
        });
    }

    public function scopeWhereControlNumber($query, $controlNumber)
    {
        return $query->where('control_number', 'like', '%' . $controlNumber . '%');
    }

    public function scopeWhereShipper($query, $shipperId)
    {
        return $query->where('shipper_id', $shipperId);
    }

    public
    function scopeWhereMovable($query, $movable)
    {
        return $query->where('movable', $movable);
    }

    public
    function scopeWhereCarModel($query, $carModelId)
    {
        return $query->where('car_model_id', $carModelId);
    }

    public
    function scopeWhereM3($query, $m3Min, $m3Max)
    {
        return $query->whereBetween('m3', [$m3Min, $m3Max]);
    }
}
