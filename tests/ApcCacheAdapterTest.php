<?php

namespace Test;

use Sanzodown\SimplePHPCache\ApcCache;
use PHPUnit\Framework\TestCase;

final class ApcCacheAdapterTest extends TestCase
{
    public function testCanSetCacheStringAndRetrieveIt(): void
    {
        $cache = new ApcCache();
        $cache->set('test', 'ceci est un test');

        $this->assertSame('ceci est un test', $cache->get('test'));
    }

    public function testCanSetCacheArrayAndRetrieveIt(): void
    {
        $cache = new ApcCache();
        $dataArray = [
            'elvis' => 'presley',
            'enjoy' => 'phoenix'
        ];

        $cache->set('apctest', $dataArray);

        $this->assertSame($dataArray, $cache->get('apctest'));
    }
}