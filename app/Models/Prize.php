<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Prize extends Model
{
    use HasFactory, HasSlug, SoftDeletes, LogsActivity;

    public $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            // ->usingSeparator('-');
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => auth()->user()->full_name . " has {$eventName} prize ID {$this->id}")
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->logAll();
    }
}
