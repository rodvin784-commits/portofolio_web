<?php
$host = 'gateway01.ap-southeast-1.prod.aws.tidbcloud.com';
$port = 4000;
$user = '4Z4z7FluvWDnMBV.root';
$pass = '7LytLJYHwVFSm1Pf';
$db   = 'db_portofolio';
$cert = realpath(__DIR__ . '/isrgrootx1.pem');

$conn = mysqli_init();

// Set opsi SSL secara eksplisit sebelum connect
mysqli_ssl_set($conn, NULL, NULL, $cert, NULL, NULL);
mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

if (@mysqli_real_connect($conn, $host, $user, $pass, $db, $port)) {
    echo "\n===========================================\n";
    echo "=== KONEKSI SUKSES BERHASIL KONEK KE TIDB! ===\n";
    echo "===========================================\n\n";
    mysqli_close($conn);
} else {
    echo "\n=== MASIHERROR: " . mysqli_connect_error() . " ===\n\n";
}
