<?php

namespace Tests\Feature\laporan;

use App\Models\User;
use Tests\TestCase;

class IndexLaporanTest extends TestCase
{
    public function test_can_redirect_to_index_laporan_page_if_authenticated(): void
    {
        $response = $this->get(route('laporan.index'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_can_access_index_laporan_page_if_authenticated(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('laporan.index'));

        $response->assertStatus(200);
        $response->assertViewIs('laporan.index');
    }
}
