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
        $response = $this->get(route('karyawan.edit', $karyawan));

        $response->assertRedirect(route('login'));
    }

    public function test_can_redirect_to_edit_karyawan_view_if_authenticated(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $karyawan = Karyawan::factory()->create();
        $response = $this->get(route('karyawan.edit', $karyawan));

        $response->assertOk();
        $response->assertViewIs('karyawan.edit');
    }

    public function test_cant_update_karyawan_if_user_not_authenticated(): void
    {
        $request = Karyawan::factory()->make()->toArray();
        $karyawan = Karyawan::factory()->create();
        $response = $this->put(route('karyawan.update', $karyawan), $request);

        $response->assertRedirect(route('login'));
    }

    public function test_can_update_karyawan_if_user_authenticated(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $request = Karyawan::factory()->make(
            [
                'name' => 'test update',
                'address' => 'test alamat'
            ]
        )->toArray();
        $karyawan = Karyawan::factory()->create();
        $response = $this->put(route('karyawan.update', $karyawan), $request);

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
        $response = $this->actingAs($user)->put(route('karyawan.update', $karyawan), $request);

        $response->assertSessionHasErrors($field);
        $this->assertEquals($errorMessage, session()->get('errors')->first($field));
    }

    public static function DataUpdateValidation(): array
    {
        return [
            'field name is required' => [
                'name', '', 'The name field is required.'
            ],
            'field name must string' => [
                'name', 1, 'The name field must be a string.'
            ],
            'field name max 255' => [
                'name', str_repeat('a', 256), 'The name field must not be greater than 255 characters.'
            ],
            'field address is required' => [
                'address', '', 'The address field is required.'
            ],
            'field address must string' => [
                'address', 1, 'The address field must be a string.'
            ],
            'field address max 255' => [
                'address', str_repeat('a', 256), 'The address field must not be greater than 255 characters.'
            ],
            'field phone is required' => [
                'phone','', 'The phone field is required.'
            ],
            'field phone must string' => [
                'phone', 1, 'The phone field must be a string.'
            ],
            'field phone max 255' => [
                'phone', str_repeat('a', 256), 'The phone field must not be greater than 255 characters.'
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
