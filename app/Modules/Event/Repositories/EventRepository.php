<?php

namespace App\Modules\Event\Repositories;

use App\Modules\Event\Event;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;

class EventRepository extends AbstractRepository implements IEventRepository
{
    protected $model;

    /**
     * EventRepository constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    /**
     * @return mixed
     */
    public function getUpcomingEvents()
    {
        $today = $this->today();

        return $this->model
                            ->where('end_date', '>', $today)
                            ->orderBy('start_date', 'desc')
                            ->get();
    }

    /**
     * @return mixed
     */
    public function getPastEvents()
    {
        $today = $this->today();

        return $this->model
                            ->where('end_date', '<', $today)
                            ->orderBy('start_date', 'desc')
                            ->limit(3)
                            ->get();
    }

    /**
     * @return string
     */
    protected function today()
    {
        return Carbon::today()->format('Y-m-d');
    }
}