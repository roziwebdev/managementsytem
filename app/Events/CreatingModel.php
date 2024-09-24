<?php

namespace App\Events;

use App\Models\Docketnew;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreatingModel
{
    use Dispatchable, SerializesModels;

    public $model;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Docketnew $model
     * @return void
     */
    public function __construct(Docketnew

    $model)
    {
        $this->model = $model;
    }
}
