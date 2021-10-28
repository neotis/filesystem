<?php

namespace Neotis\Filesystem;
use \Symfony\Component\Finder\Finder;

class File
{
    public function exist(string $file): bool
    {
        return file_exists($file);
    }

    public function missing(string $path): bool
    {
        return !$this->exist($path);
    }

    public function directories(string $directory): array
    {
        $directories = [];

        foreach (Finder::create()->in($directory)->directories()->depth(0)->sortByName() as $dir) {
            $directories[] = $dir->getPathname();
        }

        return $directories;
    }

    public function files($directory, $hidden = false): array
    {
        return iterator_to_array(
            Finder::create()->files()->ignoreDotFiles(! $hidden)->in($directory)->depth(0)->sortByName(),
            false
        );
    }
}