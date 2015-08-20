<?php


namespace AppBundle\Library;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

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
     * @var array
     */
    public $container = array();

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
     * @return Singleton
     */
    static public function getInstanceUnbroken()
    {
        if (null === self::$instance)
            self::$instance = new self;

        return self::$instance;
    }

    /**
     * @param $gender
     * @return string
     */
    public function getSalutation($gender)
    {
        $salutation = '';

        switch ($gender) {
            case 'm':
                $salutation = 'Mr.';
                break;
            case 'f':
                $salutation = 'Ms.';
                break;
        }

        return $salutation;
    }

    /**
     *
     */
    public function loadFile()
    {
        $pathToFile = __DIR__ . str_replace('/', DIRECTORY_SEPARATOR, '/../Resources/data/dummy.txt');
        if (file_exists($pathToFile))
            $this->container[] = file_get_contents($pathToFile);
        else
            throw new FileNotFoundException($pathToFile);
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