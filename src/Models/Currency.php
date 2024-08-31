<?php

namespace OoBook\Priceable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public static function getUserCurrent()
    {
        return request()->getUserCurrency();
    }

    public static function getExceptUserCurrent()
    {
        $current = self::getUserCurrent();
        return self::where('id', '!=', $current->id)->get();
    }

    public function getTable()
    {
        return config('priceable.tables.currencies', parent::getTable());
    }

}
