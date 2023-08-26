<?php


use App\Models\User;

it("can't be fetch if not logged in", function () {

    $response = $this->get(route('beers.index'));

    $response->assertStatus(302);
});

it("can be fetched if logged in", function () {

    User::factory()->create();

    $loginResponse = $this->post('/login', [
        'email' => 'root@root.it',
        'password' => 'password',
    ]);
    $token = $loginResponse->json()['token'] ?? null;

    $response = $this->withHeaders([
        'Authorization' => "Bearer $token",
    ])->get(route('beers.index'));


    $response->assertStatus(200);
});
