<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                    'id' => 1,
                    'name' => 'admin',
                    'type' => 'admin',
                    'username' => 'admin',
                    'password' => Hash::make('St3ll3nb0sch@123546'),
                    'api_token' => Str::random(80),
                    'station' => "FlightScope/Stellenbosch",
                    'station_id' => "1",
                    'created_at' => now(),
                    'updated_at' => now()
            ]);
        DB::table('users')->insert([
                    'id' => 2,
                    'name' => 'MARK',
                    'type' => 'user',
                    'username' => 'MARK',
                    'password' => Hash::make('9m\M4LD4rQ-?'),
                    'api_token' => Str::random(80),
                    'station' => "FS-STB-DEV",
                    'station_id' => "DEV01",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);
        DB::table('users')->insert([
                    'id' => 3,
                    'name' => 'SCHALK',
                    'type' => 'user',
                    'username' => 'SCHALK',
                    'password' => Hash::make('995SzQd^5qSm'),
                    'api_token' => Str::random(80),
                    'station' => "FS-STB-SUP",
                    'station_id' => "SUP01",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);    
        DB::table('users')->insert([
                    'id' => 4,
                    'name' => 'REGGIE',
                    'type' => 'user',
                    'username' => 'REGGIE',
                    'password' => Hash::make('995SzQd^5qSm'),
                    'api_token' => Str::random(80),
                    'station' => "FS-STB-PROD",
                    'station_id' => "PROD01",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);
        DB::table('users')->insert([
                    'id' => 5,
                    'name' => 'EUGENE',
                    'type' => 'user',
                    'username' => 'EUGENE',
                    'password' => Hash::make('vN3;6>![9)rT'),
                    'api_token' => Str::random(80),
                    'station' => "FS-STB-PROD",
                    'station_id' => "PROD02",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);    
        DB::table('users')->insert([
                    'id' => 6,
                    'name' => 'HERNUS',
                    'type' => 'user',
                    'username' => 'HERNUS',
                    'password' => Hash::make('3e9Y)D65vw5>'),
                    'api_token' => Str::random(80),
                    'station' => "FS-RSA-REPAIRS",
                    'station_id' => "RSA01",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);
        DB::table('users')->insert([
                    'id' => 7,
                    'name' => 'PAUL',
                    'type' => 'user',
                    'username' => 'PAUL',
                    'password' => Hash::make('3a97sC2D,4v£'),
                    'api_token' => Str::random(80),
                    'station' => "FS-USA-REPAIRS",
                    'station_id' => "USA01",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);
        DB::table('users')->insert([
                    'id' => 8,
                    'name' => 'KEI',
                    'type' => 'user',
                    'username' => 'KEI',
                    'password' => Hash::make('D{Xy6y3$6"Ge'),
                    'api_token' => Str::random(80),
                    'station' => "FS-JPN-REPAIRS",
                    'station_id' => "JPN01",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);
        DB::table('users')->insert([
                    'id' => 9,
                    'name' => 'JAMES',
                    'type' => 'user',
                    'username' => 'JAMES',
                    'password' => Hash::make('26U&c4"db.E3'),
                    'api_token' => Str::random(80),
                    'station' => "FS-KOR-REPAIRS",
                    'station_id' => "KOR01",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);
        DB::table('users')->insert([
                    'id' => 10,
                    'name' => 'ADAM',
                    'type' => 'user',
                    'username' => 'ADAM',
                    'password' => Hash::make('95fsT|bZ2h4c'),
                    'api_token' => Str::random(80),
                    'station' => "FS-POL-REPAIRS",
                    'station_id' => "POL01",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);
        DB::table('users')->insert([
                    'id' => 11,
                    'name' => 'KANE',
                    'type' => 'user',
                    'username' => 'KANE',
                    'password' => Hash::make('98\N72u{!GX3'),
                    'api_token' => Str::random(80),
                    'station' => "AUS-REPAIRS",
                    'station_id' => "AUS01",
                    'created_at' => now(),
                    'updated_at' => now()
        ]);
        DB::table('users')->insert([
                    'id' => 12,
                    'name' => 'BRIAN',
                    'type' => 'user',
                    'username' => 'BRIAN',
                    'password' => Hash::make('5yA%t\44a+2W'),
                    'api_token' => Str::random(80),
                    'station' => "UK-REPAIRS",
                    'station_id' => "UK01",
                    'created_at' => now(),
                    'updated_at' => now()
            ]
        );
    }
}
