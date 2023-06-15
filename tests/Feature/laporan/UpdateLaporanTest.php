<?php

namespace Tests\Feature\laporan;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateLaporanTest extends TestCase
{
    public function test_can_redirect_to_edit_laporan_page_if_not_authenticated(): void
    {
        $laporan = Laporan::factory()->create();

        $response = $this->get(route('laporan.edit', $laporan));

        $response->assertRedirect(route('login'));
    }

    public function test_can_access_edit_laporan_page_if_authenticated(): void
    {
        $user = User::factory()->create();
        $laporan = Laporan::factory()->create();

        $response = $this->actingAs($user)->get(route('laporan.edit', $laporan));

        $response->assertStatus(200);
        $response->assertViewIs('laporan.edit');
    }

    public function test_cant_update_laporan_if_not_authenticated(): void
    {
        $laporan = Laporan::factory()->create();
        $request = Laporan::factory()->make()->toArray();
        $response = $this->put(route('laporan.update', $laporan), $request);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseMissing('laporan', $request);
    }

    public function test_can_update_laporan_if_authenticated(): void
    {
        $user = User::factory()->create();
        $laporan = Laporan::factory()->create();
        $request = Laporan::factory()->make()->toArray();

        $response = $this->actingAs($user)->put(route('laporan.update', $laporan), $request);

        $response->assertRedirect(route('laporan.index'));
        $response->assertSessionHas('success', 'Laporan Updated Successfully!');
        $this->assertDatabaseHas('laporan', $request);
        $this->assertDatabaseMissing('laporan', $laporan->toArray());
    }

    /**
     * @dataProvider DataStoreValidation
     */
    public function test_validation_request(string $field, string|int $value,string $errorMessage): void
    {
        $user = User::factory()->create();

        $laporan = Laporan::factory()->create();

        $request = Laporan::factory()->make()->toArray();
        $request[$field] = $value;

        $response = $this->actingAs($user)->put(route('laporan.update', $laporan->id), $request);

        $response->assertSessionHasErrors($field);
        $this->assertEquals($errorMessage, session()->get('errors')->first($field));
    }

    public static function DataStoreValidation(): array
    {
        return [
            'field judul is required' => [
                'judul', '', 'The judul field is required.'
            ],
            'field judul must be string' => [
                'judul', 123, 'The judul field must be a string.'
            ],
            'field deskripsi is required' => [
                'deskripsi', '', 'The deskripsi field is required.'
            ],
            'field deskripsi must be string' => [
                'deskripsi', 123, 'The deskripsi field must be a string.'
            ],
            'field tanggal is required' => [
                'tanggal', '', 'The tanggal field is required.'
            ],
            'field tanggal must be date' => [
                'tanggal', 'abc', 'The tanggal field must be a valid date.'
            ],
            'field proyek_id is required' => [
                'proyek_id', '', 'The proyek id field is required.'
            ],
            'field proyek_id must be exists' => [
                'proyek_id', 999999999, 'The selected proyek id is invalid.'
            ],
        ];
    }
}
