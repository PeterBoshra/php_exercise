<?php


namespace App\Service;

use App\Constants\CompanyValidationStatus;
use App\Entity\Company;

interface CompanyValidatorInterface
{
    public function validateCompany(Company $company): CompanyValidationStatus;
    public function validateEmail(Company $company): bool;
    public function validateSymbol(Company $company): bool;
    public function validateStartDate(Company $company): bool;
    public function validateEndDate(Company $company): bool;
}
