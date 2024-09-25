<?php

declare(strict_types=1);

$preloadPath = sprintf(
    '%s/var/cache/%s.preload.php',
    dirname(__DIR__),
    'Brightspace_Bds_Schema_KernelProdContainer'
);

if (file_exists($preloadPath)) {
    require $preloadPath;
}
