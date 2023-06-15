<?php

namespace Tests\Feature\karyawan;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateKaryawanTest extends TestCase
{
    public function test_cant_redirect_to_edit_karyawan_view_if_not_authenticated(): void
    {
        $karyawan = Karyawan::factory()->create();
        $response = $this->get(route('karyawan.edit', $karyawan->id));

        $response->assertRedirect(route('login'));
    }

    public function test_can_redirect_to_edit_karyawan_view_if_authenticated(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $karyawan = Karyawan::factory()->create();
        $response = $this->get(route('karyawan.edit', $karyawan->id));

        $response->assertOk();
        $response->assertViewIs('karyawan.edit');
    }

    public function test_cant_update_karyawan_if_user_not_authenticated(): void
    {
        $request = Karyawan::factory()->make()->toArray();
        $karyawan = Karyawan::factory()->create();
        $response = $this->put(route('karyawan.update', $karyawan->id), $request);

        $response->assertRedirect(route('login'));
    }

    public function test_can_update_karyawan_if_user_authenticated(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $request = Karyawan::factory()->make(
            [
                'nama' => 'test update',
                'alamat' => 'test alamat'
            ]
        )->toArray();
        $karyawan = Karyawan::factory()->create();
        $response = $this->put(route('karyawan.update', $karyawan->id), $request);

        $response->assertRedirect(route('karyawan.index'));
        $response->assertSessionHas('success', 'Karyawan Updated Successfully!');
        $this->assertDatabaseMissing('karyawan', $karyawan->toArray());
        $this->assertDatabaseHas('karyawan', $request);
    }

    /**
     * @dataProvider DataUpdateValidation
     */
    public function test_validation_request(string $field, string|int $value,string $errorMessage): void
    {
        $user = User::factory()->create();

        $request = Karyawan::factory()->make()->toArray();
        $request[$field] = $value;

        $karyawan = Karyawan::factory()->create();
        $response = $this->actingAs($user)->put(route('karyawan.update', $karyawan->id), $request);

        $response->assertSessionHasErrors($field);
        $this->assertEquals($errorMessage, session()->get('errors')->first($field));
    }

    public static function DataUpdateValidation(): array
    {
        return [
            'field nama is required' => [
                'nama', '', 'The nama field is required.'
            ],
            'field nama must string' => [
                'nama', 1, 'The nama field must be a string.'
            ],
            'field nama max 255' => [
                'nama', str_repeat('a', 256), 'The nama field must not be greater than 255 characters.'
            ],
            'field alamat is required' => [
                'alamat', '', 'The alamat field is required.'
            ],
            'field alamat must string' => [
                'alamat', 1, 'The alamat field must be a string.'
            ],
            'field alamat max 255' => [
                'alamat', str_repeat('a', 256), 'The alamat field must not be greater than 255 characters.'
            ],
            'field no_telp is required' => [
                'no_telp', '', 'The no telp field is required.'
            ],
            'field no_telp must string' => [
                'no_telp', 1, 'The no telp field must be a string.'
            ],
            'field no_telp max 255' => [
                'no_telp', str_repeat('a', 256), 'The no telp field must not be greater than 255 characters.'
            ],
            'field email is required' => [
                'email', '', 'The email field is required.'
            ],
            'field email must email' => [
                'email', 'email', 'The email field must be a valid email address.'
            ],
            'field department_id is required' => [
                'department_id', '', 'The department id field is required.'
            ],
            'field department_id must int' => [
                'department_id', 'string', 'The department id field must be an integer.'
            ],
            'field department_id must exists' => [
                'department_id', 99999999, 'The selected department id is invalid.'
            ],
        ];
    }
}
