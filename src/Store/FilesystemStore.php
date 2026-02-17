<?php

namespace Symfony\HttpClientRecorderBundle\Store;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\HttpClientRecorderBundle\Har\HarFile;

final class FilesystemStore implements StoreInterface
{
    public function __construct(private string $directory, private Filesystem $filesystem)
    {
        $this->filesystem = new Filesystem();
        $this->directory = rtrim($directory, DIRECTORY_SEPARATOR);

        if (!$this->filesystem->exists($this->directory)) {
            $this->filesystem->mkdir($this->directory);
        }
    }

    private function path(string $name): string
    {
        return $this->directory.DIRECTORY_SEPARATOR.$name;
    }

    public function load(string $name): HarFile
    {
        $path = $this->path($name);

        if (!is_file($path)) {
            return HarFile::create();
        }

        return new HarFile(
            json_decode(file_get_contents($path), true, \JSON_THROW_ON_ERROR)
        );
    }

    public function save(string $name, HarFile $har): void
    {
        $this->filesystem->dumpFile(
            $this->path($name),
            json_encode($har->toArray(), \JSON_PRETTY_PRINT)
        );
    }

    public function exists(string $name): bool
    {
        return is_file($this->path($name));
    }

    public function delete(string $name): void
    {
        $this->filesystem->remove($this->path($name));
    }
}
