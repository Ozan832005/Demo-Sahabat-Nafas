<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyHistory extends Model
{
    use HasFactory;
protected $fillable = [
    'user_id', 'nama_pasien', 'usia', 'riwayat_kambuh', 'skala_mmrc',
    'pendamping', 'jenis_inhaler', 'pilihan_terapi', 'prioritas_tujuan',
    'checklist_inhaler', 'kendala_kepatuhan', 'dukungan_pendamping',
    'kesepakatan_tindakan', 'harapan_pasien', 'dukungan_pendamping_baru',
    'rencana_bertahap', 'paham_manfaat', 'pilihan_tepat', 'dukungan_cukup',
    'yakin_keputusan', 'jawaban_fakta_mitos', 'skala_sure', 'hari_pemakaian',
    'duration', 'layer', 'catatan_perawat', 'is_read',
];

protected $casts = [
    'checklist_inhaler' => 'array',
    'kendala_kepatuhan' => 'array',
    'jawaban_fakta_mitos' => 'array',
    'kesepakatan_tindakan' => 'array',
    'rencana_bertahap' => 'array',
    'usia' => 'integer',
    'hari_pemakaian' => 'integer',
    'duration' => 'integer',
    'layer' => 'integer',
    'is_read' => 'boolean',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}