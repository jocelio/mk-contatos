<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_user_type')->insert([
            'id' => 0,
            'type' => 'ADMIN',
        ]);

        DB::table('tb_user_type')->insert([
            'id' => 0,
            'type' => 'COSTUMER',
        ]);
    }
}
