<?php


namespace Source\Support;


use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    protected $optmizer;

    public function __construct($schema = 'article')
    {
        $this->optmizer = new Optimizer();
        $this->optmizer->openGraph(
            SITE,
            "pt_BR",
            $schema
        )->publisher(
            "ricardodream",
            "ricardodream"
        )->twitterCard(
            "@ricardodream",
            "@ricardodream",
            "ricardolimati.com.br"
        )->facebook(
            null,[
                "ricardodream"
            ]
        );

    }
    public function render(string $title, string $description, string $url, string $image, bool $follow = true)
    {

        return $seo = $this->optmizer->optimize($title, $description, $url, $image, $follow)->render();
    }
}