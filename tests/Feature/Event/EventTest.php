<?php

namespace Tests\Feature\Event;

use App\Modules\Event\Event;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_see_list_of_events()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $this->get(route('events'))
            ->assertStatus(200)
            ->assertSeeText($event->title)
            ->assertSeeText($event->description);
    }

}
