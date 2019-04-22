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
        
 

        DB::table('model_types')->insert([
            ['MDTP_NAME' => 'اسوره'],
            ['MDTP_NAME' => 'خاتم'],
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
