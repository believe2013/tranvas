<?php
namespace App\Modules\Event\Http\Controllers;

use App\Modules\Event\Event;
use App\Modules\Event\Repositories\IEventRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventController extends Controller
{
    private $events;

    /**
     * EventController constructor.
     * @param IEventRepository $eventRepository
     */
    public function __construct(IEventRepository $eventRepository)
    {
        $this->events = $eventRepository;
    }

    /**
     * @return $this
     */
    public function index()
    {
        $upcomingEvents = $this->events->getUpcomingEvents();

        $pastEvents = $this->events->getPastEvents();

        return view('events.event-list')
            ->with('upcomingEvents', $upcomingEvents)
            ->with('pastEvents', $pastEvents);
    }

    /**
     * @param Event $event
     * @return $this
     */
    public function view(Event $event)
    {
        return view('events.event-view')
            ->with('event', $event);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('events.event-add');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //return $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Event::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')) . '-' . uniqid(time()),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'lat' => $request->input('lat'),
            'long' => $request->input('long'),
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('events');
    }
}