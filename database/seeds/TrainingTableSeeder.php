<?php

use Illuminate\Database\Seeder;

class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert([
            'name' => 'Training Laravel',
            'description' => 'Belajar laravel',
            'trainer' => 'Ali'
        ]);

        DB::table('trainings')->insert([
            'name' => 'Training HTML',
            'description' => 'Belajar HTML',
            'trainer' => 'Abu'
        ]);

        DB::table('trainings')->insert([
            'name' => 'Training CSS',
            'description' => 'Belajar CSS',
            'trainer' => 'Ahmad'
        ]);
    }
}
