<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testLoginScenarios()
    {
        // Buat user baru
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        // Skenario 1: Login sukses
        $response = $this->post('/authenticate', [
            'email' => 'admin@gmail.com',
            'password' => 'admin',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);

        // Skenario 2: Login gagal dengan email salah
        $response = $this->post('/authenticate', [
            'email' => 'wrong@example.com',
            'password' => 'admin',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error', 'Email/Password Salah');

        // Skenario 3: Login gagal dengan password salah
        $response = $this->post('/authenticate', [
            'email' => 'admin@gmail.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error', 'Email/Password Salah');

        // Skenario 4: Login gagal dengan email dan password kosong
        $response = $this->post('/authenticate', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email', 'password']);
    }

    public function testRegisterScenario()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        // REGISTER SUCCESS
        $request = $this->actingAs($user)->post("/auth", [
            'name' => 'Gian Sonia',
            'email' => 'giansonia555@gmail.com',
            'password' => 'admin123',
            'role' => 'ADMIN',
        ]);

        $request->assertStatus(302);
        $request->assertRedirect('/auth/register');
        $request->assertSessionHas('message', 'Registrasi Berhasil');

        // REGISTER EMAIL ALREADY EXIXST
        $request = $this->actingAs($user)->post("/auth", [
            'name' => 'Gian Sonia',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'role' => 'ADMIN',
        ]);

        $request->assertStatus(302);
        $request->assertSessionHasErrors(['email']);

        // NAME EMAIL PASSWORD ROLE KOSONG
        $request = $this->actingAs($user)->post("/auth", [
            'name' => '',
            'email' => '',
            'password' => '',
            'role' => '',
        ]);

        $request->assertStatus(302);
        $request->assertSessionHasErrors(['name', 'email', 'password', 'role']);
    }

    public function testUpdateUserScenario()
    {
        // TEST UPDATE SUCCESS
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $response = $this->actingAs($user)->put('/auth/update/12345', [
            'name' => 'Gian Sonia',
            'email' => 'giansonia555@gmail.com',
            'role' => 'ADMIN',
            'password' => 'newpassword'
        ]);
        // Validasi bahwa data berhasil diperbarui
        $user->refresh();
        $this->assertEquals('Gian Sonia', $user->name);
        $this->assertEquals('giansonia555@gmail.com', $user->email);
        $this->assertTrue(Hash::check('newpassword', $user->password));
        $response->assertStatus(200);
        $response->assertViewHas('message', 'Data User Berhasil Diubah');
        // TEST UPDATE SEMUA VALUE KOSONG
        $response = $this->actingAs($user)->put('/auth/update/12345', [
            'name' => '',
            'email' => '',
            'role' => '',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'email', 'password', 'role']);
        // TEST UPDATE EMAIL ALREADY TAKEN
        $user2 = User::create([
            'uuid' => '123456',
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $response = $this->actingAs($user)->put('/auth/update/12345', [
            'name' => 'Gian Sonia',
            'email' => 'admin2@gmail.com',
            'role' => 'ADMIN',
            'password' => 'newpassword'
        ]);
        $response->assertSessionHasErrors('email');
    }

    public function testDeleteUser()
    {
        // TEST UPDATE SUCCESS
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $user2 = User::create([
            'uuid' => '123456',
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $response = $this->actingAs($user)->delete('/auth/delete/123456');
        $response->assertStatus(200);
        $response->assertViewHas('message', 'Data User Berhasil Dihapus');
    }

    public function testView()
    {
        // TEST VIEW REGISTER
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $this->actingAs($user)->get('/auth/register')
            ->assertStatus(200)
            ->assertViewIs('auth.register');

        // TEST VIEW EDIT USER
        $this->actingAs($user)->get('/auth/edit/' . $user->uuid)
            ->assertStatus(200)
            ->assertViewIs('auth.edit');
    }
}
