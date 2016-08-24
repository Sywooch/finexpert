<?php
namespace app\controllers;

use \mrssoft\sitemap\Sitemap;

class SitemapHomeController extends \mrssoft\sitemap\SitemapController
{

    /**
     * @var int Cache duration, set null to disabled
     */
    protected $cacheDuration = null; // default 12 hour

    /**
     * @var string Cache filename
     */
    protected $cacheFilename = 'sitemap-home.xml';

    public function models()
    {
        return [
            /*[
                'class' => \app\models\RuCity2::className(),
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ]*/
        ];
    }

    public function urls()
    {
        return [
            [
                'url' => 'site/index',
                'change' => Sitemap::MONTHLY,
                'priority' => 1
            ],
            [
                'url' => 'site/calculator',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/card',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/account',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/contact',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/qiwi',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/yandex',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/webmoney',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/cash',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/unistream',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/corn',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/gold',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'loans/leader',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.8
            ],
            [
                'url' => 'site/contact',
                'change' => Sitemap::MONTHLY,
                'priority' => 0.4
            ]
        ];
    }
}