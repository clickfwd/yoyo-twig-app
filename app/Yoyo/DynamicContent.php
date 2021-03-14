<?php

namespace App\Yoyo;

use Clickfwd\Yoyo\Component;

class DynamicContent extends Component
{
    public $entries = [];

    public function mount()
    {
        $data = require __DIR__.'/../test-data.php';

        shuffle($data);
        
        $this->entries = array_splice($data,0,3);        
    }
}
