<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Products extends Model
{
    use HasFactory;

    protected $fillable =['name','description'];

    /**
     * The roles that belong to the Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function measurements(): BelongsToMany
    {
        return $this->belongsToMany(Measurement::class);
    }
}
