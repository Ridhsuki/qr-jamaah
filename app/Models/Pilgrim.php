<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Pilgrim extends Model
{
    use HasFactory, HasUuids;

    /**
     * Kolom yang boleh diisi secara massal.
     * photo_path WAJIB ada di sini agar tersimpan ke DB.
     */
    protected $fillable = [
        'name',
        'passport_number',
        'umrah_id',
        'ppiu',
        'hotel_name',
        'check_in',
        'check_out',
        'photo_path', // <--- TAMBAHAN PENTING
    ];

    /**
     * Agar kolom public ID yang digunakan adalah 'uuid'
     */
    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    /**
     * Route Model Binding Customization.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * Type Casting.
     */
    protected function casts(): array
    {
        return [
            'check_in' => 'date',
            'check_out' => 'date',
        ];
    }
}
