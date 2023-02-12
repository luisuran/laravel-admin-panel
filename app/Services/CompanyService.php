<?php

namespace App\Services;

class CompanyService
{
    public function storeLogo($logo)
    {
        $logoName = time() . '.' . $logo->extension();

        $logo->move(public_path('storage'), $logoName);

        return $logoName;
    }
}
