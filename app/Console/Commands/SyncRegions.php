<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\City;

class SyncRegions extends Command
{
    protected $signature = 'regions:sync';
    protected $description = 'Sync provinces and cities data from API';

    public function handle()
    {
        $this->info('Starting sync regions...');

        try {
            $response = Http::withoutVerifying()
                ->get('https://indonesia-regions-api.vercel.app/provinces');

            if (!$response->successful()) {
                $this->error('Failed to fetch provinces data');
                return 1;
            }

            $provinces = $response->json();
            $bar = $this->output->createProgressBar(count($provinces));
            $bar->start();

            foreach ($provinces as $provinceData) {
                $province = Province::updateOrCreate(
                    ['id' => $provinceData['id']],
                    ['name' => $provinceData['name']]
                );

                $citiesResponse = Http::withoutVerifying()
                    ->get("https://indonesia-regions-api.vercel.app/provinces/{$provinceData['id']}");

                if ($citiesResponse->successful()) {
                    $cities = $citiesResponse->json()['cities'] ?? [];
                    
                    foreach ($cities as $cityData) {
                        City::updateOrCreate(
                            ['id' => $cityData['id']],
                            [
                                'province_id' => $province->id,
                                'name' => $cityData['name']
                            ]
                        );
                    }
                }

                $bar->advance();
            }

            $bar->finish();
            $this->newLine();
            $this->info('Regions sync completed successfully!');
            
            return 0;
        } catch (\Exception $e) {
            $this->error('Error syncing regions: ' . $e->getMessage());
            return 1;
        }
    }
}