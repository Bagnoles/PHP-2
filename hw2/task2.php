<?php
trait SingletonTrait {
    static protected $self;
    public static function getInstance() {
        if (self::$self === null) {
            self::$self = new self;
        }
        return self::$self;
    }
}
class Singleton {
    private function __construct() {

    }
    private function __clone() {

    }
    private function __wakeup() {

    }
    use SingletonTrait;
}
