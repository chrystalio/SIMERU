<?php

namespace Tests\Feature\laporan;

use App\Models\Laporan;
use App\Models\User;
use Tests\TestCase;

class StoreLaporanTest extends TestCase
{
    public function test_user_cant_redirect_to_laporan_create_page_if_not_authenticated(): void
    {
        $response = $this->get(route('laporan.create'));

        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

    public function test_user_can_access_laporan_create_page_if_authenticated(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('laporan.create'));

        $response->assertStatus(200);
        $response->assertViewIs('laporan.create');
    }

    public function test_user_cant_store_laporan_if_not_authenticated(): void
    {
        $request = Laporan::factory()->make()->toArray();
        $response = $this->post(route('laporan.store'), $request);

        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

    public function test_user_can_store_laporan_if_authenticated(): void
    {
        $user = User::factory()->create();
        $request = Laporan::factory()->make()->toArray();
        $response = $this->actingAs($user)->post(route('laporan.store'), $request);

        $response->assertRedirect(route('laporan.index'));
        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Laporan Created Successfully!');
        $this->assertDatabaseHas('laporan', $request);
    }

    /**
     * @dataProvider DataStoreValidation
     */
    public function test_validation_request(string $field, string|int $value, string $errorMessage): void
    {
        $user = User::factory()->create();

        $request = Laporan::factory()->make()->toArray();
        $request[$field] = $value;

        $response = $this->actingAs($user)->post(route('laporan.store'), $request);

        $response->assertSessionHasErrors($field);
        $this->assertEquals($errorMessage, session()->get('errors')->first($field));
    }

    public static function DataStoreValidation(): array
    {
        return [
            'field title is required' => [
                'title', '', 'The title field is required.',
            ],
            'field title must be string' => [
                'title', 123, 'The title field must be a string.',
            ],
            'field description is required' => [
                'description', '', 'The description field is required.',
            ],
            'field description must be string' => [
                'description', 123, 'The description field must be a string.',
            ],
            'field date is required' => [
                'date', '', 'The date field is required.',
            ],
            'field date must be date' => [
                'date', 'abc', 'The date field must be a valid date.',
            ],
            'field proyek_id is required' => [
                'proyek_id', '', 'The proyek id field is required.',
            ],
            'field proyek_id must be exists' => [
                'proyek_id', 999999999, 'The selected proyek id is invalid.',
            ],
        ];
    }
}
