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
        $this->call(UnitWorkSeeder::class);
        $this->call(classConfigTable::class);
        $this->call(StudyDocumentsSeeds::class);
        $this->call(ScheduleRegister::class);
        $this->call(UpdateConfigMail::class);
    }
}
