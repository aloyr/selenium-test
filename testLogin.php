<?php

class TestLogin extends PHPUnit_Extensions_Selenium2TestCase {
  public function setUp() {
    $this->sethost('localhost');
    $this->setPort(4444);
    $this->setBrowser('chrome');
    $this->setBrowserUrl('https://www.google.com');
    #$this->setTimeout(60);
  }

  public function testHasLoginForm() {
    #$this->url('/');

    #$username = $this->byName('username');
    #$username = $this->byName('username');

    #$this->assetEquals('', $username->value());
    #$this->assetEquals('', $password->value());

    #$this->open('/');
    #$this->waitForVisible('input');
    #$this->type('test search');
    #$this->click('//*[@id="tsf"]/div[2]/div[3]/center/input[1]');
    #$this->waitForVisible('//*[@id="search"]/div/h2');

    #$this->open('https://www.google.com/');
    #$this->url('/');
    #$this->assertEquals('Google', $this->title());
    $tlds = [
      'https://www.hidglobal.com',
      'https://www.hidglobal.com.br',
      'https://www.hidglobal.de',
      'https://www.hidglobal.fr',
      'https://www.hidglobal.kr',
      'https://www.hidglobal.jp',
      'https://www.hidglobal.ru',
      'https://www.hidglobal.mx',
      'http://www.hidglobal.cn',
    ];
    $nids = explode(PHP_EOL, file_get_contents('nids.txt'));
    $dia = date('Ymd-His');
    $screenFolder = 'screenshots/' . $dia;
    mkdir($screenFolder, 0777, TRUE);
    foreach ($tlds as $tld) {
      foreach ($nids as $nid) {
        $url = $tld . '/node/' . $nid;
        $this->url($url);
        $filename = preg_replace('/[^a-zA-Z0-9]/', '-', $this->url()) . '.png';
        $data = $this->currentScreenshot();
        file_put_contents($screenFolder . '/' . $filename, $data);
        print_r($filename);
      }
    }
  }
}

