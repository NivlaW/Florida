<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $table= 'pemesanan';
    protected $fillable = [
        'mulai',
        'selesai',
        'token',
        'id_room',
        'id_client',
        'hargatotal',
    ];
    public function room()
    {
        return $this->belongsTo(room::class,'id_room');
    }
    public function client()
    {
        return $this->belongsTo(client::class,'id_client');
    }
}
