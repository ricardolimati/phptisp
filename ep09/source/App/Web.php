<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;
use Source\Support\Seo;

class Web
{
    private $view;

    /** @var $seo Seo */

    private $seo;

    /**
     * Web Construction
     */
  public function __construct()
  {
    $this->view = Engine::create(__DIR__ . "/../../theme", "php");
    $this->seo = new Seo();
  }
  public function home(): void
  {
    $users = (new User())->find()->fetch(true);
    $head = $this->seo->render(
        "Home | " . SITE,
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lorem erat, blandit non ante vel, facilisis congue erat",
        url(),
        "https://via.placeholder.com/1200x628.png?text=HOME+COVER"
    );

    echo $this->view->render("home", [
      "head" => $head,
      "users" => $users
    ]);
  }

  public function contact(): void
  {
      $head = $this->seo->render(
          "Contato | " . SITE,
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lorem erat, blandit non ante vel, facilisis congue erat",
          url("contato"),
          "https://via.placeholder.com/1200x628.png?text=CONTATO+COVER"
      );

    echo $this->view->render("contact", [
      "head" => $head
    ]);
  }
  public function error($data): void
  {
      $head = $this->seo->render(
          "Erro {$data['errcode']} | " . SITE,
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lorem erat, blandit non ante vel, facilisis congue erat",
          url("ops/{$data['errcode']}"),
          "https://via.placeholder.com/1200x628.png?text=ERRO+{$data['errcode']}"
      );
    echo $this->view->render("error", [
        "head" => $head,
        "error" => $data["errcode"]
    ]);
  }
}




