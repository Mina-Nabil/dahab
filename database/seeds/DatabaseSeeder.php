<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        DB::table('user_types')->insert([
            'name' => "admin"
        ]);

        DB::table('users')->insert([
            'username' => "admin",
            'fullname' => 'Clark Ashraf',
            'password' => bcrypt('admin'),
            'mobNumber' => "01225212014",
            'typeID' => 1,
        ]);

        DB::table('users')->insert([
            'username' => "admin",
            'fullname' => 'Clark Ashraf',
            'password' => bcrypt('admin'),
            'mobNumber' => "01225212014",
            'typeID' => 1,
        ]);

        DB::table('model_types')->insert([
            ['MDTP_NAME' => 'اسوره'],
            ['MDTP_NAME' => 'خاتم'],
            ['MDTP_NAME' => 'حلقان'],
            ['MDTP_NAME' => 'طقم'],
            ['MDTP_NAME' => 'انسيال'],
            ['MDTP_NAME' => 'كولة']
          ]
        );

        for($i = 1 ; $i<1000 ; $i++)
        DB::table('stamps')->insert([
          'STMP_SRNO' => $i
        ]);


    }
}
