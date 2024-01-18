<?php

namespace App\Model;

class SearchData
{
    /** @var int */
    public $page = 1;

    /** @var int */
    public $sort = 1;

    /** @var string */
    public string $direction = '';

    /** @var string */
    public string $q = '';
}