<?php

require './vendor/autoload.php';

use Aws\S3\S3Client;
use League\Flysystem\Filesystem;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;

$client = new S3Client([
    'credentials' => [
        'key'    => 'KEY',
        'secret' => 'SECRET',
    ],
    'region' => 'ap-south-1',
    'version' => 'latest',
]);

$adapter = new AwsS3V3Adapter($client, 'BUCKET_NAME');
$filesystem = new Filesystem($adapter);
echo $filesystem->has('EXISTING_FILE_PATH') ? 'connected' : 'failed';

$filesystem = new Filesystem($adapter);
echo $filesystem->put('NEW_FILE_PATH', "test content");

