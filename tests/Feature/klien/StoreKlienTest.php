<?php

namespace Tests\Feature\klien;

use App\Models\Klien;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreKlienTest extends TestCase
{
    public function test_cant_redirect_to_create_klien_page_if_not_authenticated(): void
    {
        $response = $this->get(route('klien.create'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_can_access_create_klien_page(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('klien.create'));

        $response->assertStatus(200);
        $response->assertViewIs('klien.create');
    }

    public function test_cant_store_klien_if_not_authenticated(): void
    {
        $request = Klien::factory()->make()->toArray();
        $response = $this->post(route('klien.store'), $request);

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_can_store_klien_if_authenticated(): void
    {
        $user = User::factory()->create();
        $request = Klien::factory()->make()->toArray();
        $response = $this->actingAs($user)->post(route('klien.store'), $request);

        $response->assertStatus(302);
        $response->assertRedirect(route('klien.index'));
        $response->assertSessionHas('success', 'Klien Successfully Created');
        $this->assertDatabaseHas('klien', $request);
    }

    /**
     * @dataProvider DataStoreValidation
     */
    public function test_validation_request(string $field, string|int $value,string $errorMessage): void
    {
        $user = User::factory()->create();

        $request = Klien::factory()->make()->toArray();
        $request[$field] = $value;

        $response = $this->actingAs($user)->post(route('klien.store'), $request);

        $response->assertSessionHasErrors($field);
        $this->assertEquals($errorMessage, session()->get('errors')->first($field));
    }

    public static function DataStoreValidation(): array
    {
        return [
            'name is required' => ['name', '', 'The name field is required.'],
            'name is not string' => ['name', 123, 'The name field must be a string.'],
            'email is required' => ['email', '', 'The email field is required.'],
            'email is not email' => ['email', 'email', 'The email field must be a valid email address.'],
            'address is required' => ['address', '', 'The address field is required.'],
            'address is not string' => ['address', 123, 'The address field must be a string.'],
            'phone is required' => ['phone', '', 'The phone field is required.'],
            'phone is not string' => ['phone', 123, 'The phone field must be a string.'],
            'proyek_id is required' => ['proyek_id', '', 'The proyek id field is required.'],
            'proyek_id is not int' => ['proyek_id', 'string', 'The proyek id field must be an integer.'],
            'proyek_id is not exists' => ['proyek_id', 123, 'The selected proyek id is invalid.'],
        ];
    }
}
