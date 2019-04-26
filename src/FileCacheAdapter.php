<?php

namespace Sanzodown\SimplePHPCache;

class FileCacheAdapter implements CacheInterface
{
    private const EXT = '.tmp';

    private $path;
    private $fileName;

    public function __construct(?string $path = null, string $fileName = 'global')
    {
        $this->path = ($path && file_exists($path)) ? $path : $this->initDefaultFolder();
        $this->fileName = $fileName;
    }

    public function set(string $key, $value): bool
    {
        //@todo add ttl
        $data = [
            'key' => $key,
            'value' => serialize($value)
        ];

        return file_put_contents(
            $this->cacheFilePath(),
            $this->pushIntoCache($data)
        );
    }

    public function get(string $key)
    {
        $cache = $this->loadFromCache();

        return isset($cache[$key]) ? unserialize($cache[$key]) : null;
    }

    private function cacheFilePath(): string
    {
        return $this->path . DIRECTORY_SEPARATOR . $this->fileName . $this::EXT;
    }

    private function loadFromCache(): ?array
    {
        if (file_exists($this->cacheFilePath())) {
            $file = file_get_contents($this->cacheFilePath());
            return json_decode($file, true);
        }

        return null;
    }

    private function pushIntoCache(array $data): string
    {
        $cachedData = $this->loadFromCache();

        if (is_array($cachedData)) {
            $cachedData[$data['key']] = $data['value'];
            return json_encode($cachedData);
        }

        return json_encode(
            [$data['key'] => $data['value']]
        );
    }

    private function initDefaultFolder(): string
    {
        $defaultFolder = realpath($_SERVER['DOCUMENT_ROOT']) . DIRECTORY_SEPARATOR . 'cache';

        if (!file_exists($defaultFolder)) {
            mkdir($defaultFolder, 0777, true);
        }

        return $defaultFolder;
    }

}