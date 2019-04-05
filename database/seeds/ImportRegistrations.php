<?php

use App\Imports\RegistrationsImport;
use App\Registration;
use Illuminate\Database\Seeder;

class ImportRegistrations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $output = $this->command->getOutput();

        foreach (Storage::disk('dataset')->files('business-registrations') as $excelName) {
            $output->title('開始匯入：' . $excelName);
            (new RegistrationsImport)->withOutput($output)->import($excelName, 'dataset');
            Registration::whereNull('dataset')->update(['dataset' => $excelName]);

            $output->success('匯入完成');
        }
    }
}
