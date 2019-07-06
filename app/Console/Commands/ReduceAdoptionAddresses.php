<?php

namespace App\Console\Commands;

use App\Address;
use App\Adoption;
use App\AdoptionAddress;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ReduceAdoptionAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reduce:adoption_addresses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '產生動物認領養地址清單，以供查詢經緯度';

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

        $adoptions = Adoption::all();

        $bar = $this->output->createProgressBar(count($adoptions));

        foreach ($adoptions as $adoption) {
            $city = mb_substr($adoption->shelter_address, 0, 3);

            $address = $adoption->animal_foundplace;
            if (!Str::startsWith($address, $city)) {
                $address = $city . $address;
            }

            AdoptionAddress::create(compact('address'));

            $bar->advance();
        }

        $bar->finish();

        $this->output->success('產生完成');
    }
}
