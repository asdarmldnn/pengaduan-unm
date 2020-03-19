<?php

function status($a)
{
    if ($a == 1) {
        return  '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
    } else if ($a == 2) {
        return '<span class="badge badge-primary ">Dalam Proses</span>';
    } else if ($a == 3) {
        return '<span class="badge badge-danger">Ditolak</span>';
    } else if ($a == 4) {
        return '<span class="badge badge-dark">Tunda</span>';
    } else {
        return '<span class="badge badge-success">Selesai</span>';
    }
}
