<?php

namespace AppBundle\Controller;

use AppBundle\Library\Singleton;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Config\Definition\Exception\Exception;

class CaseStudyController extends Controller
{
    /**
     * Starting website with overview of case studies
     *
     * @Route("", name="case-study-overview")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * Simulates database access
     *
     * @Route("/calendar", name="case-study-calendar")
     * @Template()
     */
    public function calendarAction()
    {
        $people = $this->getDoctrine()->getRepository('AppBundle:Person')->findAll();
        return array('people' => $people);
    }

    /**
     * Simulates the use of a singleton pattern.
     *
     * @Route("/singleton", name="case-study-singleton")
     * @Template()
     */
    public function singletonAction()
    {
        $numberOfUses = 1000;
        $container = array();

        for ($i = 1; $i <= $numberOfUses; $i++)
        {
            $singleton = Singleton::getInstance();
            $singleton->identifier = 'Hello world, I am Singleton #' . $i . '!';

            $container[] = $singleton;
        }

        return array('container' => $container);
    }

    /**
     * Simulates the use of a singleton pattern, which loads a file from file system.
     *
     * @Route("/file", name="case-study-file")
     * @Template()
     */
    public function fileAction()
    {
        $numberOfUses = 50;
        $container = array();

        for ($i = 1; $i <= $numberOfUses; $i++)
        {
            $singleton = Singleton::getInstanceUnbroken();
            $singleton->identifier = 'Hello world, I am Singleton #' . $i . '!';
            $singleton->loadFile();
            $container[] = $singleton;
        }

        return array('container' => $container);
    }
}
