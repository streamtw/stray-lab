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
        // 匯入商業登記資料
        $this->call(ImportRegistrations::class);

        // 匯入地址轉經緯度資料
        $this->call(ImportAddresses::class);

        // 從商業登記資料過濾重複資料並建立寵物店
        $this->call(CreateFilteredStores::class);

        // 匯入動物認領養資料集
        $this->call(ImportAdoptions::class);
    }
}
