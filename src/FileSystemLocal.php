<?php

namespace OpxCore\FileSystem;

use OpxCore\Interfaces\FileSystemInterface;

class FileSystemLocal implements FileSystemInterface
{
    /**
     * Tells whether the filename is a directory.
     *
     * @param  string $filename
     *
     * @return  bool
     */
    public function is_dir(string $filename): bool
    {
        return is_dir($filename);
    }

    /**
     * Tells whether the filename is a regular file.
     *
     * @param  string $filename
     *
     * @return  bool
     */
    public function is_file(string $filename): bool
    {
        return is_file($filename);
    }

    /**
     * Tells whether the filename is executable.
     *
     * @param  string $filename
     *
     * @return  bool
     */
    public function is_executable(string $filename): bool
    {
        return is_executable($filename);
    }

    /**
     * Tells whether the filename is a symbolic link.
     *
     * @param  string $filename
     *
     * @return  bool
     */
    public function is_link(string $filename): bool
    {
        return is_link($filename);
    }

    /**
     * Tells whether a file exists and is readable.
     *
     * @param  string $filename
     *
     * @return  bool
     */
    public function is_readable(string $filename): bool
    {
        return is_readable($filename);
    }

    /**
     * Tells whether the filename is writable.
     *
     * @param  string $filename
     *
     * @return  bool
     */
    public function is_writable(string $filename): bool
    {
        return is_writable($filename);
    }

    /**
     * Returns information about a file path.
     *
     * @param  string $path
     * @param  null|int $options
     *
     * @return  array|string
     */
    public function pathinfo(string $path, $options = null)
    {
        return pathinfo($path, $options);
    }

    /**
     * Find pathnames matching a pattern.
     *
     *
     * @param  string $pattern
     * @param  null $flags
     *
     * @return  array|false
     */
    public function glob(string $pattern, $flags = null)
    {
        return glob($pattern, $flags);
    }

    /**
     * Returns a parent directory's path.
     *
     * @param  string $path
     * @param  int $levels
     *
     * @return  string
     */
    public function dirname(string $path, int $levels = 1): string
    {
        return dirname($path, $levels);
    }

    /**
     * Checks whether a file or directory exists.
     *
     * @param  string $filename
     *
     * @return  bool
     */
    public function file_exists(string $filename): bool
    {
        return file_exists($filename);
    }

    /**
     * Reads entire file into a string.
     *
     * @param  string $filename
     * @param  bool $use_include_path
     * @param  resource|null $context
     * @param  int $offset
     * @param  int|null $maxlen
     *
     * @return  string|false
     */
    public function file_get_contents(string $filename, bool $use_include_path = false, $context = null, int $offset = 0, int $maxlen = null)
    {
        return file_get_contents($filename, $use_include_path, $context, $offset, $maxlen);
    }

    /**
     * @param  string $filename
     * @param  string|array|resource $data
     * @param  int $flags
     * @param  resource|null $context
     *
     * @return  int|false
     */
    public function file_put_contents(string $filename, $data, int $flags = 0, $context = null): bool
    {
        return file_put_contents($filename, $data, $flags, $context);
    }

    /**
     * Makes directory.
     *
     * @param  string $pathname
     * @param  int $mode
     * @param  bool $recursive
     * @param  resource|null $context
     *
     * @return  bool
     */
    public function mkdir(string $pathname, int $mode = 0777, bool $recursive = false, $context = null): bool
    {
        // Prevent race condition of mkdir
        return mkdir($pathname, $mode, $recursive, $context) && is_dir($pathname);
    }
}