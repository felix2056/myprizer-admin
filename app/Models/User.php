<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    public $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'email',
    //     'phone',
    //     'gender',
    //     'photo',
    //     'address1',
    //     'address2',
    //     'city',
    //     'state',
    //     'postcode',
    //     'country',
    //     'password',
    //     'dob_day',
    //     'dob_month',
    //     'dob_year'
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the options for generating the slug.
    */
    // public function getSlugOptions() : SlugOptions
    // {
    //     return SlugOptions::create()
    //         ->generateSlugsFrom(['first_name', 'last_name'])
    //         ->saveSlugsTo('slug')
    //         ->doNotGenerateSlugsOnUpdate()
    //         ->usingSeparator('_');
    // }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getPhotoUrlAttribute(): string
    {
        // if user has photo, then return the photo url
        if ($this->attributes['photo']) return asset('storage/photos/' . $this->attributes['photo']);

        $background = '09DCA4';

        // if id number is odd, then 15558D
        if ($this->attributes['id'] % 2 == 0) $background = '15558D';

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->full_name) . '&background=' . $background . '&color=fff&size=128'; 
    }

    private function get_real_ip()
    {
        $realIP = '52.27.234.7'; // Default to server IP

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) //check ip from shared internet
            $realIP = $_SERVER['HTTP_CLIENT_IP'];
        
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //to check ip is passed by a proxy
            $realIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        
        else
            $realIP = $_SERVER['REMOTE_ADDR'];
        
        return $realIP;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => auth()->user()->full_name . " has {$eventName} user {$this->full_name}")
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->logAll();
    }
}
