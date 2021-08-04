<?php

class TrafficUsage
{
    public $user;
    public $internal;
    public $nightly;
    public $usage;
    public $date;

    public function __construct($user, $internal, $nightly, $usage, $date)
    {
        $this->user = $user;
        $this->internal = $internal;
        $this->nightly = $nightly;
        $this->usage = $usage;
        $this->date = $date;
    }
}
