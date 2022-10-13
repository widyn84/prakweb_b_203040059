<?php

class About {
    public function index($nama = 'Widy', $pekerjaan = 'Mahasiswa') {
        echo "Halo, nama saya adalah $nama, saya adalah $pekerjaan";
    }

    public function page() {
        echo 'About/page';
    }
}
?>