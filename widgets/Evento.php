<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Evento extends Widget
{
    public $url;
    public $titulo;
    public $options;

    public function init()
    {
        parent::init();
        $this->options = ['alt' => Yii::t('app', $this->titulo), 'class' =>  'botonF1 pulse btn'];
    }

    public function run()
    {
        return Html::a($this->titulo, $this->url, $this->options);
    }
}
//botonF1 pulse