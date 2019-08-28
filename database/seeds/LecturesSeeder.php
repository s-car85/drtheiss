<?php

use App\Lecture;
use Illuminate\Database\Seeder;

class LecturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Lecture', 100)->create();
    }
}
