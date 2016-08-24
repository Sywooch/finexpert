<?php
namespace app\controllers;

use yii\helpers\Url;

class SitemapController extends \yii\web\Controller
{
    /**
     * @var string Cache filename
     */
    protected $cacheFilename = 'sitemap.xml';

    public function actionIndex()
    {
        $cachePath = \Yii::$app->runtimePath.DIRECTORY_SEPARATOR.$this->cacheFilename;

        if (!is_file($cachePath)){
            $dom = new \DOMDocument('1.0', 'utf-8');
            $sitemapindex = $dom->createElement('sitemapindex');
            $sitemapindex->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

            $sitemap = $dom->createElement('sitemap');
                $loc = $dom->createElement('loc');
                $loc->appendChild($dom->createTextNode(Url::home(true).'sitemap-home.xml'));
                $lastmod = $dom->createElement('lastmod');
                $lastmod->appendChild($dom->createTextNode($this->dateToW3C(date("Y-m-d"))));
            $sitemap->appendChild($loc);
            $sitemap->appendChild($lastmod);
            $sitemapindex->appendChild($sitemap);
            for ($i=1; $i < 13; $i++) { 
                $sitemap = $dom->createElement('sitemap');
                    $loc = $dom->createElement('loc');
                    $loc->appendChild($dom->createTextNode(Url::home(true).'sitemap'.$i.'.xml'));
                    $lastmod = $dom->createElement('lastmod');
                    $lastmod->appendChild($dom->createTextNode($this->dateToW3C(date("Y-m-d"))));
                $sitemap->appendChild($loc);
                $sitemap->appendChild($lastmod);
                $sitemapindex->appendChild($sitemap);
            }
            
            $dom->appendChild($sitemapindex);
            $xml = $dom->saveXML();
            file_put_contents($cachePath, $xml);

        }else{
            $xml = file_get_contents($cachePath);
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        \Yii::$app->getResponse()->getHeaders()->set('Content-Type', 'text/xml; charset=utf-8');
        return $xml;
    }

    public function dateToW3C($date)
    {
        if (is_int($date)) {
            return date(DATE_W3C, $date);
        } else {
            return date(DATE_W3C, strtotime($date));
        }
    }
}