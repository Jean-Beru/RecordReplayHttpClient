<?php

namespace Symfony\HttpClientRecorderBundle\Store;

use Symfony\HttpClientRecorderBundle\Har\HarFile;

interface StoreInterface
{
    public function load(string $name): HarFile;

    public function save(string $name, HarFile $har): void;

    public function exists(string $name): bool;

    public function delete(string $name): void;
}
