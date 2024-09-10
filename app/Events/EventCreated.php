<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Http\Request;
use App\Models\Event as EventModel;

class EventCreated extends Event
{
    public EventModel $data;

    public function __construct(EventModel $data, Request $request)
    {
        parent::__construct($request);
        $this->data = $data;
    }
}
