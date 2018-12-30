<?php
declare(strict_types=1);

namespace IDEALE\Tenant;


use IDEALE\Models\User;

class TenantManager
{
    private $tenant;

    public function getTenant(): ?User
    {
        return $this->tenant;
    }

    public function setTenant($tenant)
    {
        $this->tenant = $tenant;
    }


}

//Facade::getTenant()