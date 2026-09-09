<?php

use App\Models\Event;
use App\Models\Participation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('guests are redirected to login from dashboard', function (): void {
    $this->get(route('dashboard'))->assertRedirect(route('login'));
});

test('authenticated user sees dashboard with greeting and statistics', function (): void {
    $user = User::factory()->create(['name' => 'Affan Junian']);
    $otherUser = User::factory()->create();

    $event = Event::factory()->open()->create([
        'title' => 'Aksi Bersih Pantai Kuta',
        'location' => 'Pantai Kuta, Bali',
        'latitude' => -8.7180,
        'longitude' => 115.1690,
    ]);

    Participation::factory()->create([
        'event_id' => $event->id,
        'user_id' => $user->id,
    ]);

    $this->actingAs($user)
        ->get(route('dashboard'))
        ->assertOk()
        ->assertSee('Halo, Affan')
        ->assertSee('Aksi Bersih Pantai Kuta')
        ->assertSee('Pantai Kuta, Bali')
        ->assertSee('Temukan di Sekitarmu');
});

test('dashboard shows clean empty state when no events or logs exist', function (): void {
    $user = User::factory()->create(['name' => 'Budi Santoso']);

    $this->actingAs($user)
        ->get(route('dashboard'))
        ->assertOk()
        ->assertSee('Halo, Budi')
        ->assertSee('0')
        ->assertSee('Belum ada kegiatan yang tersedia saat ini.')
        ->assertSee('Belum ada lokasi kegiatan di sekitarmu.');
});

test('dashboard excludes draft and cancelled events from recommendations', function (): void {
    $user = User::factory()->create();

    $openEvent = Event::factory()->open()->create(['title' => 'Event Terbuka Sambung']);
    $draftEvent = Event::factory()->draft()->create(['title' => 'Event Draft Rahasia']);
    $cancelledEvent = Event::factory()->cancelled()->create(['title' => 'Event Dibatalkan']);

    $this->actingAs($user)
        ->get(route('dashboard'))
        ->assertOk()
        ->assertSee('Event Terbuka Sambung')
        ->assertDontSee('Event Draft Rahasia')
        ->assertDontSee('Event Dibatalkan');
});

test('user can sign out from dashboard', function (): void {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('logout'))
        ->assertRedirect(route('login'));

    $this->assertGuest();
});
