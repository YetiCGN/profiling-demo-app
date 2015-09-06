<?php

namespace AppBundle\Controller;

use AppBundle\Library\Singleton;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Config\Definition\Exception\Exception;

class CaseStudyController extends Controller
{
    private static $SINGLETON_TEXT = 'Hello world, I am instance number %d';

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
     * Simulates the use of the singleton pattern, which loads a file from file system.
     *
     * @Route("/static-file", name="case-study-static-file")
     * @Template("AppBundle:CaseStudy:static-file.html.twig")
     */
    public function staticFileAction()
    {
        $numberOfUses = 50;
        $container = array();

        for ($i = 1; $i <= $numberOfUses; $i++)
        {
            $singleton = Singleton::getInstance();
            $singleton->identifier = sprintf(self::$SINGLETON_TEXT, $i);
            $singleton->getFile();
            $container[] = $singleton;
        }

        return array('container' => $container);
    }
}
