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

    /**
     * Get all of the directories within a given directory.
     *
     * @param string $directory
     * @return array
     */
    public function directories(string $directory): array
    {
        $directories = [];

        foreach (Finder::create()->in($directory)->directories()->depth(0)->sortByName() as $dir) {
            $directories[] = $dir->getPathname();
        }

        return $directories;
    }
}