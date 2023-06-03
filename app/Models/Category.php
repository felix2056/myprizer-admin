<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public $guarded = [];

    public function prizes()
    {
        return $this->hasMany(Prize::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => auth()->user()->full_name . " has {$eventName} category {$this->name}")
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->logAll();
    }
}
