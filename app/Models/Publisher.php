<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'identifier',
        'first_name',
        'last_name'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'publisher_id');
    }
}
