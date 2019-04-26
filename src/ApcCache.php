<?php

namespace Sanzodown\SimplePHPCache;

class ApcCache implements CacheInterface
{
    private const DEFAULT_TTL = 3600;
    private $ttl;

    public function __construct(int $ttl = self::DEFAULT_TTL)
    {
        $this->ttl = $ttl;
        if (!extension_loaded('apcu')) {
            throw new \Exception('Please, enable APCu extension first.');
        }
    }

    public function get(string $key)
    {
        return apcu_fetch($key);
    }

    public function set(string $key, $value): bool
    {
        return apcu_store($key, $value, $this->ttl);
    }
}