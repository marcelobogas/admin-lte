<?php

namespace App\Controllers\Admin;

use App\Helpers\View;

class DashboardController
{
    public function index()
    {
        return (new View)->render("admin/dashboard", []);
    }
}
