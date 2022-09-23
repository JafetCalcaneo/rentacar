<?php

namespace app\widgets;

use Yii;



class Carousel extends \yii\bootstrap5\Carousel
{
   public static function carouselForm ($urlImage){
     Carousel::widget([
        'items' => [
            // the item contains only the image
            '<img src="$urlImage"/>',
                   
            // the item contains both the image and the caption
            [
                'content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg"/>',
                'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                
            ],
        ]
    ]); 
    
   }
    
    
}
