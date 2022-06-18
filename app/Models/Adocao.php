<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adocao extends Model
{
    use HasFactory;

    protected $table = 'adocoes';

    protected $fillable = ['pet_id', 'email', 'valor'];

    /**
     * Define a relação de adoção com o pet
     *
     * @return BelongsTo
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
