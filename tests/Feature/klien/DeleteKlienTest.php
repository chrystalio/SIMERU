<?php

namespace Tests\Feature\klien;

use App\Models\Klien;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteKlienTest extends TestCase
{
    public function test_cant_delete_klien_if_not_authenticated(): void
    {
        $klien = Klien::factory()->create();
        $response = $this->delete(route('klien.delete', $klien));

        $response->assertRedirect(route('login'));
    }

    public function test_can_delete_klien_if_authenticated(): void
    {
        $user = User::factory()->create();
        $klien = Klien::factory()->create();
        $response = $this->actingAs($user)->delete(route('klien.delete', $klien));

        $response->assertRedirect(route('klien.index'));
        $response->assertSessionHas('success', 'Klien Successfully Deleted');
        $this->assertDatabaseMissing('klien', $klien->toArray());
    }
}
