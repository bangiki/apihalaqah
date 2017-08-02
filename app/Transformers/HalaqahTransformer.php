<?php
namespace App\Transformers;
use App\Halaqah as mHalaqah;
use League\Fractal\TransformerAbstract;

/**
 *
 */
class HalaqahTransformer extends TransformerAbstract
{
    function transform(mHalaqah $halaqah){

        return [
            'uuid'              =>  $halaqah->uuid,
            'pertemuan'         =>  (int) $halaqah->nis,
            'tema_kajian'       =>  $halaqah->nama_siswa,
            'tempat_kajian'     =>  $halaqah->date_pinjam,
            'waktu_kajian'      =>  $halaqah->date_pinjam,
            'pengisi_kajian'    =>  $halaqah->date_kembali,
            'dokumentasi'       =>  $halaqah->kelas,
            'tilawah'           =>  \App\MyFunc::setUTC($halaqah->tilawah),
            'infaq'             =>  (int) $halaqah->petugas,
            'saldo'             =>  $halaqah->nama_petugas,
            'kode_barang'       =>  $halaqah->pinjam_item
            
        ];

    }

}
