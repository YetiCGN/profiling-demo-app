<?php


namespace AppBundle\Library;

/**
 * Class Singleton
 * @package AppBundle\Library
 */
class Singleton
{
    /**
     * @var string
     */
    public $identifier = null;

    /**
     * @var Singleton
     */
    static private $instance = null;

    /**
     * @return Singleton
     */
    static public function getInstance()
    {
        // TODO: uncomment for production
        //if (null === self::$instance)
            self::$instance = new self;

        return self::$instance;
    }

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     *
     */
    private function __clone()
    {
    }
}