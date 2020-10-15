<?php

namespace App\Yoyo;

use Clickfwd\Yoyo\Component;

class NestingParent extends Component
{
    public function mount()
    {
        $this->emitTo('#wishlist-counter', 'reset-likes');
    }

    public function getEntriesProperty()
    {
        $entries = require APP_PATH.'/test-data.php';

        $keys = array_rand($entries, 3);

        $entries = array_intersect_key($entries, array_flip($keys));

        return $entries;
    }
}
