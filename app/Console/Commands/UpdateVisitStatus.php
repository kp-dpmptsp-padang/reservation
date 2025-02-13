<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Visit;
use App\VisitStatusEnum;

class UpdateVisitStatus extends Command
{
    protected $signature = 'visits:update-status';
    protected $description = 'Update the status of visits based on the current date';

    public function handle()
    {
        // Update visits from VERIFIED to ONGOING
        $visitsToStart = Visit::where('status', VisitStatusEnum::VERIFIED)
                              ->whereDate('day', now()->toDateString())
                              ->get();

        foreach ($visitsToStart as $visit) {
            if ($visit->shouldStart()) {
                $visit->start();
            }
        }

        // Update visits from ONGOING to COMPLETED
        $visitsToComplete = Visit::where('status', VisitStatusEnum::ONGOING)
                                 ->whereDate('day', '<', now()->toDateString())
                                 ->get();

        foreach ($visitsToComplete as $visit) {
            if ($visit->shouldComplete()) {
                $visit->complete();
            }
        }

        $this->info('Visit statuses updated successfully.');
    }
}