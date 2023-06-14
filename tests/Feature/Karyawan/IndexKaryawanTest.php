<?php

namespace Tests\Feature\karyawan;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexKaryawanTest extends TestCase
{
    public function test_cant_view_karyawan_index_if_not_authenticated(): void
    {
        $response = $this->get(route('karyawan.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_can_view_karyawan_index_if_authenticated(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('karyawan.index'));

        $response->assertOk();
        $response->assertViewIs('karyawan.index');
    }
}
