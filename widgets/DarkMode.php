<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;


class DarkMode extends Widget
{
    public $isDark = true;
    public $features;
    public $imagen;
    public $options;
    public $clases;

    public function init()
    {
        parent::init();
        if ($this->imagen === null) {
            $this->imagen = 'lunaBlanca.png';
        }

        if ($this->options === null) {
            /*  Html::addCssClass($this->options, ['widget' => 'zoomimagen']); */
            // $this->options = ['alt' => Yii::t('app', $this->titulo), 'class' =>  'zoomimagen'];
        }
        // $this->registerJs($script);

    }

    public function run()
    {
        return Html::button('', [
            'style' =>
            'background: url(' . $this->imagen . ') no-repeat;
            width: 40px;
            border: none;
            margin-left: 750px',
            'onclick' => <<< JS
            const features = document.querySelector('.features');
            let isDark = document.getElementsByClassName('isDark');
            let isDark2 = document.getElementsByClassName('isDark2');
            let cards = document.getElementsByClassName('card');

            let element =  window.getComputedStyle(features);    
            let currentColor = element.getPropertyValue('background-color');
    
            let setColor = (currentColor == 'rgb(255, 255, 255)') ? '#0e192b' : '#FFFFFF';
            let setColor2 = (currentColor == 'rgb(255, 255, 255)') ? '#182947' : '#f4f9fc';
            let setColorCards = (currentColor == 'rgb(255, 255, 255)') ? '#FFC107' : '#FFFFFF';
    
            for(let i = 0; i < isDark.length; i++){
                isDark[i].style.background = setColor;
            }

            for(let i = 0; i < isDark2.length; i++){
                isDark2[i].style.background = setColor2;
            }

            for(let i = 0; i < cards.length; i++){
                cards[i].style.background = setColorCards;
            }
    
JS
        ]);
    }
}
