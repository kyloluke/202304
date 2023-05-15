<?php

namespace Services\Lp3Ship\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Core\App\Models\Destination;
use Services\Lp3Ship\App\Models\ShipScheduleItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class ShipScheduleItemFactory extends Factory
{
    protected $model = ShipScheduleItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $polPortArr = [
            'type' => PortType::POL->value
        ];

        $podPortArr = [
            'type' => PortType::POL->value
        ];
        $polPort = Port::factory()->make($polPortArr);
        $podPort = Port::factory()->make($podPortArr);

        $fd = Destination::factory()->create();

        return [
            'ship_schedule_id' => 'placeholder',// 作成する時、オーバライドされる
            'pol_port_id' => $polPort->id,
            'pol_arrival_at' => fake()->dateTimeThisMonth,
            'pol_arrived_at' => fake()->dateTimeThisMonth,
            'pol_departure_at' => fake()->dateTimeThisMonth,
            'pol_departed_at' => fake()->dateTimeThisMonth,
            'pod_port_id' => $podPort->id,
            'pod_arrival_at' => fake()->dateTimeThisMonth,
            'pod_arrived_at' => fake()->dateTimeThisMonth,
            'document_cut_at' => fake()->dateTimeThisMonth,
            'document_am_cut' => fake()->boolean,
            'cy_open_at' => fake()->dateTimeThisMonth,
            'cy_cut_at' => fake()->dateTimeThisMonth,
            'cy_am_cut' => fake()->boolean,
            'remarks' => fake()->sentence(333),
            'irregular_cy_cut' => fake()->boolean,
            'available' => fake()->boolean,
            'fd_id' => $fd->id,
            'fd_arrival_at' => fake()->dateTimeThisMonth,
            'fd_arrived_at' => fake()->dateTimeThisMonth,
            'go_down_at' => fake()->dateTimeThisMonth,
            'go_down_zip_code' => fake()->postcode,
            'go_down_address' => fake()->address
        ];
    }
}
