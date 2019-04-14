<?php

use App\Imports\AdoptionsImport;
use App\Adoption;
use Illuminate\Database\Seeder;

class ImportAdoptions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $output = $this->command->getOutput();

        foreach (Storage::disk('dataset')->files('adoptions') as $excelName) {
            $output->title('開始匯入：' . $excelName);
            (new AdoptionsImport)->withOutput($output)->import($excelName, 'dataset');
            $output->success('匯入完成');
        }
    }
}
