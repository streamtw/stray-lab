<?php

use App\Address;
use App\Registration;
use App\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CreateFilteredStores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registrations = Registration::all();

        $output = $this->command->getOutput();

        $output->progressStart(count($registrations));

        foreach ($registrations as $registration) {
            if (Store::where('tax_number', $registration->tax_number)->where('status', 1)->exists()) {
                $output->progressAdvance();
                continue;
            }

            $attributes = Arr::only(
                $registration->attributesToArray(),
                ['tax_number', 'name', 'address']
            );

            $address = $registration->address;
            $addressMapping = Address::where('address', $address)->first();

            $attributes['city'] = mb_substr($address, 0, 3);
            $attributes['status'] = $registration->isActive();
            $attributes['type'] = mb_substr($registration->dataset, -7, 3);;
            $attributes['longitude'] = $addressMapping->longitude;
            $attributes['latitude'] = $addressMapping->latitude;

            Store::updateOrCreate(['tax_number' => $registration->tax_number], $attributes);

            $output->progressAdvance();
        }

        $output->progressFinish();
    }
}
