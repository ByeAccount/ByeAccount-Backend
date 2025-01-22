<?php

use App\Models\Website;
use function Pest\Laravel\getJson;

beforeEach(function () {
    Website::factory()
        ->create([
            'name' => 'google',
        ]);
});

/*
|--------------------------------------------------------------------------
| Action
|--------------------------------------------------------------------------
*/

it('can show a website', function () {
    $response = getJson(
        uri: route('website.show', ['id' => 1]),
    )->assertOk();

    $website = $response->json();

    expect($website['name'])->toBe("google");
});

/*
|--------------------------------------------------------------------------
| Erreur
|--------------------------------------------------------------------------
*/

it('can not show a website with wrong id', function () {
    $response = getJson(
        uri: route('website.show', ['id' => 2]),
    )->assertNotFound();
});
