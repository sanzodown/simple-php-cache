<?php

namespace Test;

use App\ApcCacheAdapter;
use PHPUnit\Framework\TestCase;

final class ApcCacheAdapterTest extends TestCase
{
    public function testCanSetCacheStringAndRetrieveIt(): void
    {
        $cache = new ApcCacheAdapter();
        $cache->set('test', 'ceci est un test');

        $this->assertSame('ceci est un test', $cache->get('test'));
    }

    public function testCanSetCacheArrayAndRetrieveIt(): void
    {
        $cache = new ApcCacheAdapter();
        $dataArray = [
            'elvis' => 'presley',
            'enjoy' => 'phoenix'
        ];

        $cache->set('apctest', $dataArray);

        $this->assertSame($dataArray, $cache->get('apctest'));
    }
}