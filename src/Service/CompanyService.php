<?php

namespace App\Service;


use App\Constants\CompanyValidationStatus;
use App\Entity\Company;

class CompanyService implements CompanyServiceInterface
{
    protected $companyValidator;

    public function __construct(CompanyValidatorInterface $companyValidator)
    {
          $this->companyValidator = $companyValidator;
    }

    public function create()
    {
       $company = new Company();
       $company->setEmail("peteracmilan@gmail.com");
       $company->setSymbol("3238474");
       $company->setStartDate(new \DateTime(date('Y-m-d H:i:s')));
       $company->setStartDate(new \DateTime(date('Y-m-d H:i:s')));

       $this->companyValidator->validateCompany($company);

    }

    public function validateSymbol($symbol)
    {

    }
    public function getAll()
    {

    }
}
