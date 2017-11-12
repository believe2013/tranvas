<?php

namespace App\Modules\Event\Repositories;

use App\Repositories\IRepository;

interface IEventRepository extends IRepository
{
    public function getUpcomingEvents();

    public function getPastEvents();
}