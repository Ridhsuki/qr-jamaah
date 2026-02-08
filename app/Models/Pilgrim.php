<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Pilgrim extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'passport_number',
        'umrah_id',
        'ppiu',
        'hotel_name',
        'check_in',
        'check_out',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    /**
     * Route Model Binding Customization.
     * Saat panggil route: /scan/{pilgrim}, Laravel otomatis cari by uuid.
     * Clean Code: Controller jadi lebih bersih.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * Type Casting.
     * Mengubah data database menjadi tipe data PHP native yang sesuai.
     * Memudahkan manipulasi tanggal di Blade View (UI/UX).
     */
    protected function casts(): array
    {
        return [
            'check_in' => 'date',
            'check_out' => 'date',
        ];
    }
}
