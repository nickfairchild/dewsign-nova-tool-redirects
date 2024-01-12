<?php

namespace Dewsign\NovaToolRedirects\Models;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $casts = [
        'last_hit' => 'datetime',
    ];

    protected $guarded = [];

    public static function toRedirector()
    {
        $redirects = self::all()->mapWithKeys(function ($redirect) {
            return [$redirect->from => [$redirect->to, $redirect->status_code]];
        })->toArray();

        return $redirects;
    }
}
