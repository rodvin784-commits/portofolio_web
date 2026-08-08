<?php

// Buat folder temporary wajib di environment serverless Vercel
$storageDirs = [
    '/tmp/storage/run',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/plugin',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Set path log dan cache ke /tmp
$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

require __DIR__ . '/../public/index.php';
