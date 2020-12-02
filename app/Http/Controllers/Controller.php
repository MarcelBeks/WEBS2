<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function isManager($request)
    {
        return $this->isRole($request, \App\Role::MANAGER);
    }

    protected function isEmployee($request)
    {
        return $this->isRole($request, \App\Role::EMPLOYEE);
    }

    protected function isMember($request)
    {
        return $this->isRole($request, \App\Role::MEMBER);
    }

    protected function isAny($request)
    {
        return (($this->isManager($request) || $this->isEmployee($request) || $this->isMember($request)));
    }

    private function isRole($request, $role)
    {
        if ($request->user()->authorizeRoles($role) === false)
            return false;

        return true;
    }
}
