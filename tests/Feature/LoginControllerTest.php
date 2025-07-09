<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Admin;

uses(RefreshDatabase::class);

describe('LoginController', function () {
    test('login form loads', function () {
        $response = $this->get(route('login'));
        $response->assertOk();
        $response->assertViewIs('auth.login');
    });

    test('admin can login and access restricted page', function () {
        $admin = Admin::factory()->create([
            'password' => bcrypt('password123'),
        ]);
        $response = $this->post(route('login'), [
            'email' => $admin->email,
            'password' => 'password123',
        ]);
        $response->assertRedirect('/');
        $this->assertTrue(session()->has('admin_id'));
        $restricted = $this->withSession(['admin_id' => $admin->id])->get('/admin');
        $restricted->assertOk();
    });

    test('guest cannot access restricted page', function () {
        $response = $this->get('/admin');
        $response->assertRedirect(route('login'));
    });

    test('admin cannot login with wrong credentials', function () {
        $admin = Admin::factory()->create([
            'password' => bcrypt('password123'),
        ]);
        $response = $this->post(route('login'), [
            'email' => $admin->email,
            'password' => 'wrongpass',
        ]);
        $response->assertSessionHasErrors('email');
    });

    test('admin can logout', function () {
        $admin = Admin::factory()->create();
        session(['admin_id' => $admin->id]);
        $response = $this->post(route('logout'));
        $response->assertRedirect(route('login'));
        $this->assertFalse(session()->has('admin_id'));
    });

    test('admin can register', function () {
        $response = $this->post(route('admin.register'), [
            'name' => 'Test Admin',
            'email' => 'testadmin@example.com',
            'password' => 'password123',
        ]);
        $response->assertSessionHas('admin_register_success');
        $this->assertDatabaseHas('admin', [
            'email' => 'testadmin@example.com',
        ]);
    });
});
