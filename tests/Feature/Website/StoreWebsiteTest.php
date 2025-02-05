<?php

use App\Models\Website;

use function Pest\Laravel\postJson;

/*
|--------------------------------------------------------------------------
| Action
|--------------------------------------------------------------------------
*/

it('can store a website', function () {
    postJson(
        uri: route('website.store'),
        data: [
            'name' => 'Google',
            'logo_url' => 'https://www.google.com/logo.png',
            'website_url' => 'https://www.google.com',
            'deletion_url' => 'https://www.google.com/delete',
            'steps' => [
                [
                    'order' => 1,
                    'text' => 'Step 1',
                ],
                [
                    'order' => 2,
                    'text' => 'Step 2',
                ],
            ],
        ],
    )->assertOk();

    $website = Website::where('name', 'Google')->first();
    expect($website->name)->toBe('Google');
    expect($website->logo_url)->toBe('https://www.google.com/logo.png');
    expect($website->website_url)->toBe('https://www.google.com');
    expect($website->deletion_url)->toBe('https://www.google.com/delete');
    expect($website->steps->count())->toBe(2);
    expect($website->steps->first()->text)->toBe('Step 1');
    expect($website->steps->last()->text)->toBe('Step 2');
});

it('can store a website without steps & logo_url', function () {
    postJson(
        uri: route('website.store'),
        data: [
            'name' => 'Google',
            'website_url' => 'https://www.google.com',
            'deletion_url' => 'https://www.google.com/delete',
        ],
    )->assertOk();

    $website = Website::where('name', 'Google')->first();
    expect($website->name)->toBe('Google');
    expect($website->logo_url)->toBeNull();
    expect($website->website_url)->toBe('https://www.google.com');
    expect($website->deletion_url)->toBe('https://www.google.com/delete');
    expect($website->steps->count())->toBe(0);
});

/*
|--------------------------------------------------------------------------
| Erreur
|--------------------------------------------------------------------------
*/

it('can not store a website with name error', function () {
    postJson(
        uri: route('website.store'),
        data: [
            'name' => 'AaaaaaaaaaAaaaaaaaaaAaaaaaaaaaAaaaaaaaaaAaaaaaaaaaAaaaaaaaaaA',
            'website_url' => 'https://www.google.com',
            'deletion_url' => 'https://www.google.com/delete',
        ],
    )->assertUnprocessable();

    $website = Website::where('name', 'AaaaaaaaaaAaaaaaaaaaAaaaaaaaaaAaaaaaaaaaAaaaaaaaaaAaaaaaaaaaA')->first();
    expect($website)->toBeNull();
});
