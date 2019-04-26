<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\FileCacheAdapter;

final class CacheTest extends TestCase
{
    public function testCanSetCacheAndRetrieveIt()
    {
        $cache = new FileCacheAdapter();
        $cache->set('test', 'toto');

        $this->assertSame('toto', $cache->get('test'));
    }

    public function testCanSetCacheArrayAndRetrieveIt()
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