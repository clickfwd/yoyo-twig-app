<?php

namespace App\Yoyo;

use Clickfwd\Yoyo\Component;

class LiveSearch extends Component
{
    protected $data;

    protected $queryString = ['q'];

    public $q;

    public function mount()
    {
        $this->data = require __DIR__.'/../test-data.php';
    }

    public function results()
    {
        $results = [];

        if ($this->q) {
            foreach ($this->data as $data) {
                if (strstr(strtolower($data['title']), $this->q)) {
                    $results[] = $data;
                }
            }
        }

        return $results;
    }
}
