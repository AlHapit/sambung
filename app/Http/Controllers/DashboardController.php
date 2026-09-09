<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\Event;
use App\Models\ImpactLog;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $activeUsersCount = User::count();
        $communityEventsCount = Event::whereIn('status', ['open', 'completed'])->count();
        $peopleHelpedCount = ImpactLog::where('type', 'event_participation')->count()
            + Connection::where('status', 'completed')->count();

        $recommendedEvents = Event::query()
            ->where('status', 'open')
            ->where('event_date', '>=', now())
            ->with(['organizer', 'participations.user'])
            ->withCount('participations')
            ->orderBy('event_date')
            ->take(4)
            ->get();

        $mapEvents = Event::query()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->whereIn('status', ['open', 'completed'])
            ->take(10)
            ->get(['id', 'title', 'category', 'location', 'latitude', 'longitude']);

        $categoryCounts = $mapEvents->groupBy('category')->map->count();

        return view('dashboard', [
            'activeUsersCount' => $activeUsersCount,
            'communityEventsCount' => $communityEventsCount,
            'peopleHelpedCount' => $peopleHelpedCount,
            'recommendedEvents' => $recommendedEvents,
            'mapEvents' => $mapEvents,
            'categoryCounts' => $categoryCounts,
        ]);
    }
}
