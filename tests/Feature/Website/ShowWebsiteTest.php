<?php

use App\Models\Step;
use App\Models\Website;

use function Pest\Laravel\getJson;

beforeEach(function () {
    $this->website = Website::factory()
        ->create([
            'name' => 'Google',
            'logo_url' => 'https://www.google.com/logo.png',
            'website_url' => 'https://www.google.com',
            'deletion_url' => 'https://www.google.com/delete',
        ]);

    Step::factory()
        ->for($this->website)
        ->create([
            'order' => 2,
            'text' => 'Step 2',
        ]);

    Step::factory()
        ->for($this->website)
        ->create([
            'order' => 1,
            'text' => 'Step 1',
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

    expect($website['name'])->toBe('Google');
    expect($website['logo_url'])->toBe('https://www.google.com/logo.png');
    expect($website['website_url'])->toBe('https://www.google.com');
    expect($website['deletion_url'])->toBe('https://www.google.com/delete');
    expect($website['steps'])->toHaveCount(2);
    expect($website['steps'][0]['text'])->toBe('Step 1');
    expect($website['steps'][1]['text'])->toBe('Step 2');
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
