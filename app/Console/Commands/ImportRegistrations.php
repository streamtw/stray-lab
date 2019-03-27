<?php

namespace App\Console\Commands;

use App\Imports\RegistrationsImport;
use App\Registration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportRegistrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:registrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '匯入商業登記資料';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $files = Storage::disk('dataset')->files('business-registrations');
        foreach ($files as $excelName) {
            $this->output->title('開始匯入：' . $excelName);
            (new RegistrationsImport)->withOutput($this->output)->import($excelName, 'dataset');
            Registration::whereNull('dataset')->update(['dataset' => $excelName]);
            $this->output->success('匯入完成');
        }
    }
}
