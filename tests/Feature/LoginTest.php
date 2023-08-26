<?php


use App\Models\User;

it('can login', function () {

    User::factory()->create();

    $response = $this->post('/login', [
        'email' => 'root@root.it',
        'password' => 'password',
    ]);

    $token = $response->json()['token'] ?? null;
    $this->assertNotNull($token);

    $response->assertStatus(200);
});

