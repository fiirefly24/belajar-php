<?php

$zipName = "backup.zip";
$filesToInclude = ["../task1/hello.txt", "../task3/app.log"];

function createZip($zipName, $filesToInclude) {
    $zip = new ZipArchive();

    $res = $zip->open($zipName, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    if (!$res) {
        die("Cannot open <$zipName>\n");
    }

    foreach ($filesToInclude as $file) {
        if (!file_exists($file)) {
            echo "File $file does not exist.\n";
            continue;
        }
        $zip->addFile($file, basename($file));
    }

    // Add dynamic file
    $temp = tmpfile();
    $meta = stream_get_meta_data($temp);
    $tempPath = $meta['uri'];

    $timestamp = (new DateTime("now", new DateTimeZone("Asia/Jakarta")))->format("Y-m-d H:i:s");
    file_put_contents($tempPath, "Backup generated at $timestamp\n");

    $zip->addFile($tempPath, "readme.txt");
    $zip->close();

    echo "✅ Backup created: $zipName\n";
    fclose($temp);
}

createZip($zipName, $filesToInclude);
?>