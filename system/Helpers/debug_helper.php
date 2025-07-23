<?php

if (! function_exists('clean_path')) {
    /**
     * Grabs a clean path, without relative directory paths (../) and without
     * a leading slash.
     */
    function clean_path(string $file): string
    {
        // Provide a fallback just in case
        $file = realpath($file) ?: $file;

        // remove all leading up-directory references:
        $file = preg_replace('#^(\.\./)+#', '', $file);

        // replace the document root with empty string
        if (isset($_SERVER['DOCUMENT_ROOT'])) {
            $file = str_replace(realpath($_SERVER['DOCUMENT_ROOT']), '', $file);
        }

        // Remove any root path
        if (defined('ROOTPATH')) {
            $file = str_replace(ROOTPATH, '', $file);
        }

        return $file;
    }
}