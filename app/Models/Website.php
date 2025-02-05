<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_url',
        'website_url',
        'deletion_url',
    ];

    /**
     * Get the steps for the website.
     */
    public function steps(): HasMany
    {
        return $this->hasMany(Step::class)->orderBy('order');
    }
}
