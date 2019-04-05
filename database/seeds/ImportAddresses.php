<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportAddresses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents(database_path('seeds/addresses.sql')));
    }
}
