#!/bin/php
<?php

declare(strict_types=1);

$xmlFile = $argv[1];
$xsdFile = $argv[2];

foreach ([$xmlFile, $xsdFile] as $file) {
    if (!file_exists($file)) {
        echo sprintf(
            'File "%s" is not found.' . PHP_EOL,
            $file
        );
        die(1);
    }
    if (!is_readable($file)) {
        echo sprintf(
            'File "%s" is not readable.' . PHP_EOL,
            $file
        );
        die(2);
    }
}

$dom = new DOMDocument();
$dom->load($xmlFile);

if (!$dom->schemaValidate($xsdFile)) {
    echo sprintf(
        'File "%s" is not valid according to xsd.' . PHP_EOL,
        $file
    );
    die(3);
}

echo sprintf('File "%s" is ok.', $xmlFile) . PHP_EOL;

