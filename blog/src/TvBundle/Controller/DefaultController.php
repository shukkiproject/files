<?php

namespace TvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DomCrawler\Crawler;

class DefaultController extends Controller
{
    /**
     * @Route("/tv")
     */
    public function indexAction()
    {
        $crawler = new Crawler();
        $crawler->addContent('<html><body><p>These are text filtered by XPath "body/p".</p></body></html>');
        $text[]=$crawler->filterXPath('descendant-or-self::body/p')->text();

        $crawler2 = new Crawler();
        $crawler2->addContent('<html><body><p>These are text filtered by CSS Selectors "body > p".</p></body></html>');
        $text[]=$crawler2->filter('body > p')->text();

        $crawler3 = new Crawler();
        $xml=file_get_contents("bundles/framework/xml/tvdb.xml");
        $crawler3->add($xml);

        $series=$crawler3->filter('Series')->each(function (Crawler $nodeCrawler) {
                    $seriesid = $nodeCrawler->filter('seriesid');
                    $language = $nodeCrawler->filter('language');
                    $SeriesName = $nodeCrawler->filter('SeriesName');
                    $banner = $nodeCrawler->filter('banner');
                    $Overview = $nodeCrawler->filter('Overview');
                    $FirstAired = $nodeCrawler->filter('FirstAired');
                    $IMDB_ID = $nodeCrawler->filter('IMDB_ID');
                    $zap2it_id = $nodeCrawler->filter('zap2it_id');
                    $id = $nodeCrawler->filter('id');           

                    return [
                    'seriesId'=> $seriesid->count() ? $seriesid->text() : null,
                    'language'=> $language->count() ? $language->text() : null,
                    'seriesName'=> $SeriesName->count() ? $SeriesName->text() : null,
                    'banner'=> $banner->count() ? $banner->text() : null,
                    'overview'=> $Overview->count() ? $Overview->text() : null,
                    'firstAired'=> $FirstAired->count() ? $FirstAired->text() : null,
                    'imdbId'=> $IMDB_ID->count() ? $IMDB_ID->text() : null,
                    'zap2ItId'=> $zap2it_id->count() ? $zap2it_id->text() : null,
                    'id'=> $id->count() ? $id->text() : null,
                ];
                });


                var_dump($series);



        return $this->render('TvBundle:Default:index.html.twig', array(
            'text' => $text, 'series' => $series,
        ));
    }


 }
