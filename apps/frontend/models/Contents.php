<?php


namespace Modules\Frontend\Models;

use Phalcon\Mvc\Collection;

class Contents extends Collection{
    public function getContents(){
        return Contents::find();
    }
    public function getData($url){
        return Contents::findFirst(array(
            'conditions' => array(
                'url' => $url
            )
        ));
    }
}