<?php

namespace App\Listeners;

use App\Events\CreatingModel;
use App\Models\Docketnew;

class IncrementIdListener
{
    /**
     * Handle the event.
     *
     * @param \App\Events\CreatingModel $event
     * @return void
     */
    public function handle(CreatingModel $event)
    {
        $model = $event->model;
        $lastRecord = Docketnew::orderBy('id', 'desc')->first();
        if ($lastRecord) {
            $model->id = $lastRecord->id + 100;
        } else {
            $model->id = 583424; // Nilai awal jika tabel kosong
        }
    }
}

