<?php

namespace App;
namespace App\Notifications;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\User;
class Full_text_search extends Model
{
    use notify;
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'full_text_searches.CustomerName'  => 10,
            'full_text_searches.Gender'   => 10,
            'full_text_searches.Address'   => 10,
            'full_text_searches.City'    => 10,
            'full_text_searches.PostalCode'  => 10,
            'full_text_searches.Country'   => 10,
            'full_text_searches.Customerid'    => 10,
        ]
    ];

    protected $fillable = [
        'CustomerName', 'Gender', 'Address', 'City', 'PostalCode', 'Country',
    ];
}

