<?php

namespace Sanzodown\SimplePHPCache;

interface CacheInterface
{
    public function get(string $key);

    public function set(string $key, $value): bool;
}