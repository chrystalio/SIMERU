<?php

namespace Tests\Feature\laporan;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteLaporanTest extends TestCase
{
    public function test_cant_delete_laporan_if_not_authenticated(): void
    {
        $laporan = Laporan::factory()->create();

        $response = $this->delete(route('laporan.delete', $laporan));

        $response->assertRedirect(route('login'));
    }

    public function test_can_delete_laporan_if_authenticated(): void
    {
        $user  = User::factory()->create();
        $laporan = Laporan::factory()->create();
        $response = $this->actingAs($user)->delete(route('laporan.delete', $laporan));

        $response->assertRedirect(route('laporan.index'));
        $response->assertSessionHas('success', 'Laporan Deleted Successfully!');
        $this->assertDatabaseMissing('laporan', $laporan->toArray());
    }
}
