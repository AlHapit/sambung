<?php

use App\Models\Connection;
use App\Models\Event;
use App\Models\ImpactLog;
use App\Models\Message;
use App\Models\Need;
use App\Models\Participation;
use App\Models\Session;
use App\Models\Skill;
use App\Models\User;
use Database\Seeders\DemoScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $this->seed(DemoScenarioSeeder::class);
});

test('the demo scenario seeds users and their owned skills and needs', function (): void {
    $raka = User::where('email', 'raka@sambung.test')->firstOrFail();
    $pakBudi = User::where('email', 'budi@sambung.test')->firstOrFail();

    expect(User::count())->toBeBetween(5, 10);
    expect(Skill::count())->toBeBetween(10, 20);
    expect(Need::count())->toBeBetween(5, 10);
    expect($raka->skills()->pluck('name')->all())->toContain('Digital Payment', 'Smartphone', 'Programming');
    expect($pakBudi->needs()->where('title', 'Ingin belajar pembayaran digital')->exists())->toBeTrue();
});

test('seeded events, participations, connections, sessions, and messages reference valid models', function (): void {
    expect(Event::count())->toBeBetween(5, 8);
    expect(Participation::count())->toBeGreaterThan(0);
    expect(Connection::count())->toBeGreaterThan(0);
    expect(Session::count())->toBeGreaterThan(0);
    expect(Message::count())->toBeGreaterThan(0);

    Event::with('organizer')->each(function (Event $event): void {
        expect($event->organizer)->not->toBeNull();
        expect($event->organizer->role)->toBe('organizer');
    });

    Participation::with(['event', 'user'])->each(function (Participation $participation): void {
        expect($participation->event)->not->toBeNull();
        expect($participation->user)->not->toBeNull();
    });

    Connection::with(['need', 'mentor', 'mentee', 'sessions'])->each(function (Connection $connection): void {
        expect($connection->need)->not->toBeNull();
        expect($connection->mentor)->not->toBeNull();
        expect($connection->mentee)->not->toBeNull();
        expect($connection->need->user_id)->toBe($connection->mentee_id);
    });

    Message::with('sender')->each(function (Message $message): void {
        expect($message->sender)->not->toBeNull();
        expect($message->room())->not->toBeNull();
    });
});

test('the Raka to Pak Budi mentoring scenario is complete and records impact', function (): void {
    $raka = User::where('email', 'raka@sambung.test')->firstOrFail();
    $pakBudi = User::where('email', 'budi@sambung.test')->firstOrFail();
    $need = Need::where('title', 'Ingin belajar pembayaran digital')->firstOrFail();

    $connection = Connection::where([
        'need_id' => $need->id,
        'mentor_id' => $raka->id,
        'mentee_id' => $pakBudi->id,
        'status' => 'completed',
    ])->firstOrFail();

    $session = Session::where([
        'connection_id' => $connection->id,
        'status' => 'completed',
    ])->firstOrFail();

    $impactLog = ImpactLog::where([
        'user_id' => $raka->id,
        'type' => 'mentoring_hours',
        'reference_type' => 'session',
        'reference_id' => $session->id,
    ])->firstOrFail();

    expect($need->status)->toBe('completed');
    expect($session->duration_minutes)->toBe(90);
    expect((float) $impactLog->value)->toBe(1.5);
});

test('the completed bank sampah participation records related impact', function (): void {
    $raka = User::where('email', 'raka@sambung.test')->firstOrFail();
    $bankSampah = Event::where('title', 'Bank Sampah RW 05')->firstOrFail();

    $participation = Participation::where([
        'event_id' => $bankSampah->id,
        'user_id' => $raka->id,
        'status' => 'attended',
    ])->firstOrFail();

    $impactLog = ImpactLog::where([
        'user_id' => $raka->id,
        'type' => 'event_participation',
        'reference_type' => 'participation',
        'reference_id' => $participation->id,
    ])->firstOrFail();

    expect($bankSampah->status)->toBe('completed');
    expect($participation->completed_at)->not->toBeNull();
    expect((float) $impactLog->value)->toBe(1.0);
});
