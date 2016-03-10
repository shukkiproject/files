<?php

namespace TvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DomCrawler\Crawler;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        
        return $this->render('TvBundle:Default:index.html.twig');
    }

    // src/AppBundle/Controller/BlogController.php

// ...
// ...

$crawler = $crawler
    ->filter('body > p')
    ->reduce(function (Crawler $node, $i) {
        // filter every other node
        return ($i % 2) == 0;
    });
}
