<?php
namespace app\controllers;

use \mrssoft\sitemap\Sitemap;

class Sitemap4Controller extends \mrssoft\sitemap\SitemapController
{

    /**
     * @var int Cache duration, set null to disabled
     */
    protected $cacheDuration = null; // default 12 hour

    /**
     * @var string Cache filename
     */
    protected $cacheFilename = 'sitemap4.xml';

    public function models()
    {
        //set_time_limit(6000);
        return [
            [
                'class' => \app\models\Sitemap4::className(),
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ]
        ];
    }

    public function urls()
    {
        return [
            
        ];
    }
}