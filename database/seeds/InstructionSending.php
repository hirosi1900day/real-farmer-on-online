<?php

use Illuminate\Database\Seeder;

class InstructionSending extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('instructions')->insert([
            'name' => '野菜を収穫する',
            'point' => '100'
        ]);
    }
}
