<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyHistory extends Model
{
    use HasFactory;
    protected $casts = [
        'checklist_inhaler' => 'array',
        'kendala_kepatuhan' => 'array',
        'jawaban_fakta_mitos' => 'array',
        'kesepakatan_tindakan' => 'array',
        'rencana_bertahap' => 'array',
    ];
    protected $fillable = [
        'user_id',
        'admin_id',
        'therapy_type',
        'duration',
        'notes',
        'status',
        'layer',
        'nama_pasien',
        'usia',
        'riwayat_kambuh',
        'skala_mmrc',
        'pendamping',
        'jenis_inhaler',
        'checklist_inhaler',
        'hari_pemakaian',
        'kendala_kepatuhan',
        'pilihan_terapi',
        'jawaban_fakta_mitos',
        'prioritas_tujuan',
        'dukungan_pendamping',
        'kesepakatan_tindakan',
        'jawaban_sure',
        'skor_sure',
        'paspor_keputusan',
        'perawat_notes',
        'harapan_pasien',
        'dukungan_pendamping_baru',
        'rencana_bertahap',
        'paham_manfaat',
        'pilihan_tepat',
        'dukungan_cukup',
        'yakin_keputusan'
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