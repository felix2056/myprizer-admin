<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SiteSetting extends Model
{
    use HasFactory, LogsActivity;

    public $guarded = [];

    public function getSiteCurrencySymAttribute()
    {
        $currency = $this->site_currency;
        $currency_symbol = '';

        switch ($currency) {
            case 'USD':
                $currency_symbol = '$';
                break;
            case 'EUR':
                $currency_symbol = '€';
                break;
            case 'GBP':
                $currency_symbol = '£';
                break;
            case 'JPY':
                $currency_symbol = '¥';
                break;
            case 'AUD':
                $currency_symbol = '$';
                break;
            case 'CAD':
                $currency_symbol = '$';
                break;
            case 'CHF':
                $currency_symbol = 'CHF';
                break;
            case 'CNY':
                $currency_symbol = '¥';
                break;
            case 'SEK':
                $currency_symbol = 'kr';
                break;
            case 'NZD':
                $currency_symbol = '$';
                break;
            case 'MXN':
                $currency_symbol = '$';
                break;
            case 'SGD':
                $currency_symbol = '$';
                break;
            case 'HKD':
                $currency_symbol = '$';
                break;
            case 'NOK':
                $currency_symbol = 'kr';
                break;
            case 'KRW':
                $currency_symbol = '₩';
                break;
            case 'TRY':
                $currency_symbol = '₺';
                break;
            case 'RUB':
                $currency_symbol = '₽';
                break;
            case 'INR':
                $currency_symbol = '₹';
                break;
            case 'BRL':
                $currency_symbol = 'R$';
                break;
            case 'ZAR':
                $currency_symbol = 'R';
                break;
            case 'SAR':
                $currency_symbol = '﷼';
                break;
            case 'AED':
                $currency_symbol = 'د.إ';
                break;
            case 'AFN':
                $currency_symbol = '؋';
                break;
            case 'ALL':
                $currency_symbol = 'L';
                break;
            case 'AMD':
                $currency_symbol = '֏';
                break;
            case 'ARS':
                $currency_symbol = '$';
                break;
            case 'AZN':
                $currency_symbol = '₼';
                break;
            case 'BAM':
                $currency_symbol = 'KM';
                break;
            case 'BDT':
                $currency_symbol = '৳';
                break;
            default:
                $currency_symbol = $currency;
                break;
        }

        return $currency_symbol;
    }

    public function getSiteHeaderLogoPathAttribute()
    {
        return config('app.url') . '/storage/' . $this->attributes['site_header_logo'];
    }

    public function getSiteFooterLogoPathAttribute()
    {
        return config('app.url') . '/storage/' . $this->attributes['site_footer_logo'];
    }

    public function getSiteFaviconPathAttribute()
    {
        return config('app.url') . '/storage/' . $this->attributes['site_favicon'];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('system')
            ->setDescriptionForEvent(fn(string $eventName) => auth()->user()->full_name . " has {$eventName} site settings")
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->logAll();
    }
}
