<?php

namespace Tests\Feature\klien;

use App\Models\Klien;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateKlienTest extends TestCase
{
    public function test_cant_redirect_edit_page_if_not_authenticated(): void
    {
        $klien = Klien::factory()->create();
        $response = $this->get(route('klien.edit', $klien));

        $response->assertRedirect(route('login'));
    }

    public function test_can_redirect_edit_page_if_authenticated(): void
    {
        $klien = Klien::factory()->create();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('klien.edit', $klien));

        $response->assertStatus(200);
        $response->assertViewIs('klien.edit');
        $response->assertViewHas('klien');
    }

    public function test_cant_update_klien_if_not_authenticated(): void
    {
        $klien = Klien::factory()->create();
        $request = Klien::factory()->make()->toArray();
        $response = $this->put(route('klien.update', $klien), $request);

        $response->assertRedirect(route('login'));
    }

    public function test_can_update_klien_if_authenticated(): void
    {
        $klien = Klien::factory()->create();
        $user = User::factory()->create();
        $request = Klien::factory()->make()->toArray();
        $response = $this->actingAs($user)->put(route('klien.update', $klien), $request);

        $response->assertRedirect(route('klien.index'));
        $response->assertSessionHas('success', 'Klien Successfully Updated');
        $this->assertDatabaseHas('klien', $request);
        $this->assertDatabaseMissing('klien', $klien->toArray());
    }

    /**
     * @dataProvider DataStoreValidation
     */
    public function test_validation_request(string $field, string|int $value,string $errorMessage): void
    {
        $user = User::factory()->create();

        $request = Klien::factory()->make()->toArray();
        $request[$field] = $value;

        $klien = Klien::factory()->create();
        $response = $this->actingAs($user)->put(route('klien.update', $klien), $request);

        $response->assertSessionHasErrors($field);
        $this->assertEquals($errorMessage, session()->get('errors')->first($field));
    }

    public static function DataStoreValidation(): array
    {
        return [
            'nama is required' => ['nama', '', 'The nama field is required.'],
            'nama is not string' => ['nama', 123, 'The nama field must be a string.'],
            'email is required' => ['email', '', 'The email field is required.'],
            'email is not email' => ['email', 'email', 'The email field must be a valid email address.'],
            'alamat is required' => ['alamat', '', 'The alamat field is required.'],
            'alamat is not string' => ['alamat', 123, 'The alamat field must be a string.'],
            'no_telp is required' => ['no_telp', '', 'The no telp field is required.'],
            'no_telp is not string' => ['no_telp', 123, 'The no telp field must be a string.'],
            'proyek_id is required' => ['proyek_id', '', 'The proyek id field is required.'],
            'proyek_id is not int' => ['proyek_id', 'string', 'The proyek id field must be an integer.'],
            'proyek_id is not exists' => ['proyek_id', 123, 'The selected proyek id is invalid.'],
        ];
    }
}
