<?php

use App\Models\Website;

use function Pest\Laravel\getJson;

beforeEach(function () {
    Website::factory()
        ->create([
            'name' => 'hellomyfriend',
        ]);

    Website::factory()
        ->create([
            'name' => 'hellomyaal',
        ]);

    Website::factory()
        ->create([
            'name' => 'himyfriend',
        ]);
});

/*
|--------------------------------------------------------------------------
| Action
|--------------------------------------------------------------------------
*/

it('can get all websites', function () {
    $response = getJson(
        uri: route('website.index')
    )->assertOk();

    $websites = $response->json('data');
    expect($websites)->toHaveCount(3);
});

it('can get a website websites', function () {
    $response = getJson(
        uri: route('website.index', ['name' => 'llo']),
    )->assertOk();

    $websites = $response->json('data');
    expect($websites)->toHaveCount(2);
    expect($websites[0]['name'])->toBe('hellomyaal');
    expect($websites[1]['name'])->toBe('hellomyfriend');
});
