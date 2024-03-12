<?php namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('devices')->insert([
            [
                'id' => 1,
                'associatedPatientFullName' => 'Joelle Pépin',
                'noSerie'=>'123456789',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'associatedPatientFullName' => 'Margaret Hubert',
                'noSerie'=>'20202020',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'associatedPatientFullName' => 'George Doe',
                'noSerie'=>'40302911',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'associatedPatientFullName' => 'Guy Smith',
                'noSerie'=>'20202080',
                'user_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'associatedPatientFullName' => 'Guy Laravel',
                'noSerie'=>'20266080',
                'user_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'associatedPatientFullName' => 'Antoine Gauthier',
                'noSerie'=>'20206688',
                'user_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
