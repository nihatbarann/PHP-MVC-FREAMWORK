<?php
defined('APP') or exit(header('Location: '.URL));

class Cache
{
    private $cacheDir = 'storage/cache/';
    private $cacheTime = 3600; // Örnekte 1 saat

    public function get($key)
    {
        $filename = $this->getCacheFileName($key);

        if (file_exists($filename) && time() - filemtime($filename) < $this->cacheTime) {
            return unserialize(file_get_contents($filename));
        }

        return false;
    }

    public function set($key, $data)
    {
        $filename = $this->getCacheFileName($key);

        file_put_contents($filename, serialize($data));

        return true;
    }

    public function delete($key)
    {
        $filename = $this->getCacheFileName($key);

        if (file_exists($filename)) {
            unlink($filename);
            return true;
        }

        return false;
    }

    public function clear()
    {
        $files = glob($this->cacheDir . '*');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        return true;
    }

    public function setCacheDir($dir)
    {
        $this->cacheDir = $dir;
    }

    public function setCacheTime($time)
    {
        $this->cacheTime = $time;
    }

    private function getCacheFileName($key)
    {
        return $this->cacheDir . md5($key) . '.cache';
    }
}
?>