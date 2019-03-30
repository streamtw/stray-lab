<?php

namespace App\Console\Commands;

use App\Address;
use App\Registration;
use Illuminate\Console\Command;

class ReduceAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reduce:addresses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '產生地址清單，以供查詢經緯度';

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
        $this->output->title('開始產生地址清單');

        $addresses = Registration::all()->pluck('address')->unique()->toArray();

        $bar = $this->output->createProgressBar(count($addresses));

        foreach ($addresses as $address) {
            Address::create(compact('address'));

            $bar->advance();
        }

        $bar->finish();

        $this->output->success('產生完成');
    }
}
