<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Destination;
use Services\Lp3Core\App\Models\InspectionType;
use Services\Lp3Core\App\Models\Office;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Models\User;
use Services\Lp3Ship\App\Enums\ShipType;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Models\ShipCompany;

/**
 * レビュワ―用シーダー
 */
class ReviewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\Services\Lp3Cargo\App\Models\CarBrand::factory(10)->create();

        //\Services\Lp3Cargo\App\Models\CarModel::factory(10)->create();

        //\Services\Lp3Core\App\Models\YardGroupRegularHolidays::factory(10)->create();

        //$this->createOffice();
        //$this->createUser();

        $this->createCountry();

        $this->createPort();
        $this->createDestination();

        $this->createShip();
        $this->createShipCompany();
    }

    /**
     * 事業所の作成
     */
    private function createOffice()
    {
        $rows = [
            ['name' => 'a', 'businessTypes' => [BusinessType::CUSTOM_BROKER]],
            ['name' => 'b', 'businessTypes' => [BusinessType::CARGO_LOADER]],
            ['name' => 'c', 'businessTypes' => [BusinessType::STOCK_MANAGER]],
            ['name' => 'd', 'businessTypes' => [BusinessType::WAREHOUSE_OWNER]],
            ['name' => 'e', 'businessTypes' => [BusinessType::DRAYAGER]],
        ];

        foreach ($rows as $row) {
            Office::factory()
                ->businessTypes($row['businessTypes'])
                ->create([
                    'name' => $row['name'],
                ]);
        }

        // memo:
        // PostgreSQLの場合、id を指定すると、 XXX_id_seq が更新されず、その後 id の指定なしで作成したときに以下のようなエラーが発生する。
        // `SQLSTATE[23505]: Unique violation: 7 ERROR:  duplicate key value violates unique constraint "XXX_pkey"`
        // どうしても id の指定が必要な場合は、作成後に以下のようなクエリを実行し、XXX_id_seq を更新する必要がある。
        // `SELECT setval('XXX_id_seq', COALESCE((SELECT MAX(id) FROM table_name), 0));`
    }

    /**
     * ユーザーの作成
     */
    private function createUser()
    {
        $rows = [
            ['name' => 'a'],
            ['name' => 'b'],
            ['name' => 'c'],
            ['name' => 'd'],
            ['name' => 'e'],
        ];

        foreach ($rows as $row) {
            User::factory()
                ->create([
                    'name' => $row['name'],
                ]);
        }
    }

    /**
     * 国の作成
     */
    private function createCountry()
    {
        $inspectionType1 = InspectionType::factory()->create(['name' => 'hoge']);
        $inspectionType2 = InspectionType::factory()->create(['name' => 'fuga']);

        $rows = [
            ['name' => 'a'],
            ['name' => 'b'],
            ['name' => 'c'],
            ['name' => 'd'],
        ];

        foreach ($rows as $row) {
            Country::factory()
                ->hasAttached($inspectionType1, relationship: 'requiredInspections')
                ->hasAttached($inspectionType2, relationship: 'requiredInspections')
                ->create([
                    'name' => $row['name'],
                ]);
        }
    }

    /**
     * 港の作成
     */
    private function createPort()
    {
        $rows = [
            ['name' => 'a', 'type' => PortType::POL],
            ['name' => 'b', 'type' => PortType::POL],
            ['name' => 'c', 'type' => PortType::POD],
            ['name' => 'd', 'type' => PortType::POD],
        ];

        foreach ($rows as $row) {
            Port::factory()->create([
                'name' => $row['name'],
                'type' => $row['type'],
            ]);
        }
    }

    /**
     * 仕向地の作成
     */
    private function createDestination()
    {
        $rows = [
            ['name' => 'destination-a'],
            ['name' => 'destination-b'],
            ['name' => 'destination-c'],
            ['name' => 'destination-d'],
        ];

        foreach ($rows as $row) {
            Destination::factory()->create([
                'name' => $row['name'],
            ]);
        }
    }

    /**
     * 本船の作成
     */
    private function createShip()
    {
        $rows = [
            ['name' => 'a', 'type' => ShipType::CONTAINER_SHIP],
            ['name' => 'b', 'type' => ShipType::RORO_SHIP],
            ['name' => 'c', 'type' => ShipType::CONRO_SHIP],
        ];

        foreach ($rows as $row) {
            Ship::factory()->create([
                'name' => $row['name'],
                'type' => $row['type'],
            ]);
        }
    }

    /**
     * 船会社の作成
     */
    private function createShipCompany()
    {
        $rows = [
            ['name' => 'a'],
            ['name' => 'b'],
            ['name' => 'c'],
            ['name' => 'd'],
        ];

        foreach ($rows as $row) {
            ShipCompany::factory()->create([
                'name' => $row['name'],
            ]);
        }
    }
}
