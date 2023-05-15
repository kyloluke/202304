<?php

namespace Services\Lp3Cargo\Database\Factories;

use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\Chassis;
use Services\Lp3Cargo\Refers\Models\Office;
use Services\Lp3Cargo\App\Models\CargoType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Job\App\Enums\JobType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ChassisFactory extends Factory
{
    protected $model = Chassis::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cargoType = CargoType::factory()->create();
        $carModel = CarModel::factory()->create();
        $shipper = Office::factory()->create();
        $primeForwarder = Office::factory()->create();
        $incrementId = Chassis::getIncrementId();
        return [
            'cargo_type_id' => $cargoType->id,
            'car_model_id' => $carModel->id,
            'control_number' => $incrementId + 1,
            'number' => fake()->text(10),
            'search_number' => fake()->text(10),
            'displacement' => mt_rand(1600, 2000) + mt_rand(0, 99) / 100,
            'weight' => mt_rand(1400, 1600) + mt_rand(0, 99) / 100,
            'extent' => mt_rand(160, 180) + mt_rand(0, 99) / 100,
            'width' => mt_rand(130, 160) + mt_rand(0, 99) / 100,
            'height' => mt_rand(80, 130) + mt_rand(0, 99) / 100,
            'm3' => mt_rand(10, 20) + mt_rand(0, 999) / 1000,
            'movable' => fake()->boolean,
            'shipper_id' => $shipper->id,
            'shipper_ref_no' => fake()->text(10),
            'prime_forwarder_id' => $primeForwarder->id,
            'require_collect_key' => fake()->boolean,
            'require_extra_lashing' => fake()->boolean,
            'require_photo_for_sale' => fake()->boolean,
            'remarks' => fake()->text(15),
            'inner_cargo_remarks' => fake()->text(15),
            'admin_remarks' => fake()->text(15),
            'expected_job_type' => fake()->randomElement(array_column(JobType::cases(), 'value')),
        ];
    }
}
