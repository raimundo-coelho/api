<?php
/**
 * Created by PhpStorm.
 * User: argen
 * Date: 05/10/2018
 * Time: 16:03
 */

namespace IDEALE\Tenant;


use Illuminate\Support\Facades\Facade;

class TenantFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return TenantManager::class;
    }
}