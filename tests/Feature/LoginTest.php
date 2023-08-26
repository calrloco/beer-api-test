<?php


use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('can login', function () {

    $user = User::factory()->create();

    $response = $this->post('/login', [
        'username' => 'root',
        'password' => 'password'
    ]);

    $token = $response->json()['token'] ?? null;
    $this->assertNotNull($token);

    $response->assertStatus(200);
});

