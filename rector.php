<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([__DIR__ . '/src']) // Adjust the path as necessary
    ->withSets([
        \Rector\Doctrine\Set\DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
        \Rector\Symfony\Set\SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES,
    ]);