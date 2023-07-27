<?php

namespace Tests\Feature\karyawan;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteKaryawanTest extends TestCase
{
    public function test_cant_delete_karyawan_if_not_authenticated(): void
    {
        $karyawan = Karyawan::factory()->uuid()->create();
        $response = $this->delete(route('karyawan.delete', $karyawan));

        $response->assertRedirect('/login');
    }

    public function test_can_delete_karyawan_if_authenticated(): void
    {
        $user = User::factory()->create();
        $karyawan = Karyawan::factory()->uuid()->create();
        $response = $this->actingAs($user)->delete(route('karyawan.delete', $karyawan));

        $response->assertRedirect(route('karyawan.index'));
        $response->assertSessionHas('success', 'Karyawan Deleted Successfully!');
        $this->assertDatabaseMissing('karyawan', $karyawan->toArray());
    }
}
