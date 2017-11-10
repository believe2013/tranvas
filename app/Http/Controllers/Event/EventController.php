<?php

namespace App\Http\Controllers\Event;

use App\Modules\Event\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * @return $this
     */
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');
        $upcomingEvents = Event::where('end_date', '>', $today)
                                ->orderBy('start_date', 'desc')
                                ->get();
        $pastEvents = Event::where('end_date', '<', $today)
            ->orderBy('start_date', 'desc')
            ->limit(3)
            ->get();

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
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'lat' => $request->input('lat'),
            'long' => $request->input('long'),
            'user_id' => $request->user()->id,
        ]);

        return redirect()->back();
    }
}
