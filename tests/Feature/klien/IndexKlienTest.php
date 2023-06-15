<?php

namespace Tests\Feature\klien;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexKlienTest extends TestCase
{
    public function test_cant_redirect_to_klien_index_page_if_not_authenticated(): void
    {
        $response = $this->get(route('klien.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_can_redirect_to_klien_index_page_if_authenticated(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('klien.index'));

        $response->assertStatus(200);
        $response->assertViewIs('klien.index');
        $response->assertViewHas('kliensData');
    }
}
