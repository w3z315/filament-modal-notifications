<?php

namespace W3z315\ModalNotifications\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \W3z315\ModalNotifications\ModalNotifications
 */
class ModalNotifications extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \W3z315\ModalNotifications\ModalNotifications::class;
    }
}
