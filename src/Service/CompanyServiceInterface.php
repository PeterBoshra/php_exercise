<?php


namespace App\Service;


use App\Entity\Company;

interface CompanyServiceInterface
{
    public function create();
    public function getAll();
}
