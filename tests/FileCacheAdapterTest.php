<?php

namespace Test;

use Sanzodown\SimplePHPCache\FileCacheAdapter;
use PHPUnit\Framework\TestCase;

final class FileCacheAdapterTest extends TestCase
{
    public function testCanSetCacheStringAndRetrieveIt(): void
    {
        $cache = new FileCacheAdapter();
        $cache->set('test', 'toto');

        $this->assertSame('toto', $cache->get('test'));
    }

    public function testCanSetCacheArrayAndRetrieveIt(): void
    {
        $cache = new FileCacheAdapter();
        $dataArray = [
            'hello' => 'bjr',
            'bye' => 'au revoir'
        ];

        $cache->set('test', $dataArray);

        $this->assertSame($dataArray, $cache->get('test'));
    }

}