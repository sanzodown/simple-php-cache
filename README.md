A simple cache library for php.
It implement both a file and a memory ([APCu](https://www.php.net/manual/fr/book.apcu.php)) cache back-ends. 

## Installation
As simple as :
```:
composer require sanzodown/simple-php-cache
```

## Usage

Both come with default configuration so if you don't bother, use it.

### File cache:
```:
$cache = new FileCacheAdapter(
    'your/cache/path',
    'youNameFile'
);
```

### Memory cache:

Note that you must have the extension [APCu](https://www.php.net/manual/fr/book.apcu.php) enabled.

```:
$cache = new ApcCacheAdapter(
    3600, // Time to live
);
```

### Methods:
```:
$cache->set('key', 'Your datas');

$cache->get('test'); // Your datas
```
