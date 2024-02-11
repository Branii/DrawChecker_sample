<?php 
 require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
 use Stash\Pool;
 class Cache {
    private static $pool;
    //save to cache
    public static function push(String $key, Array $data) : STRING {
        self::$pool = new Pool(new Stash\Driver\FileSystem());
        $item = self::$pool->getItem($key);
        self::$pool->save($item->set(json_encode($data)));
        return "";
    }

    public static function pull(String $key) : ARRAY {
        self::$pool = new Pool(new Stash\Driver\FileSystem());
        $item = self::$pool->getItem($key);
        return json_decode($item->get(),true);
    }
    

 }