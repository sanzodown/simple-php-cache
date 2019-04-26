<?php

namespace Test;

use Sanzodown\SimplePHPCache\FileCache;
use PHPUnit\Framework\TestCase;

final class FileCacheAdapterTest extends TestCase
{
    public function testCanSetCacheStringAndRetrieveIt(): void
    {
        $cache = new FileCache();
        $cache->set('test', 'toto');

        $this->assertSame('toto', $cache->get('test'));
    }

    public function testCanSetCacheArrayAndRetrieveIt(): void
    {
        $cache = new FileCache();
        $dataArray = [
            'hello' => 'bjr',
            'bye' => 'au revoir'
        ];

        $cache->set('test', $dataArray);

        $this->assertSame($dataArray, $cache->get('test'));
    }

}