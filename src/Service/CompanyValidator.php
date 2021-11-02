<?php

namespace App\Service;


use App\Constants\CompanyValidationStatus;
use App\Entity\Company;

class CompanyValidator implements CompanyValidatorInterface
{

    public function validateCompany(Company $company): CompanyValidationStatus
    {

        $validationStatus = new CompanyValidationStatus();

        $validators = [
            'validateEmail',
            'validateSymbol',
            'validateStartDate',
            'validateEndDate',
        ];

        foreach ($validators as $validator) {
            if (!call_user_func([$this, $validator], $company)) {
                $validationStatus->isValid = false;
                $validationStatus->invalidReason = $validator . " is triggered with false";
                break;
            }
        }

        return $validationStatus;
    }

    public function validateEmail(Company $company): bool
    {
        $email = $company->getEmail();
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ;
    }
    public function validateSymbol(Company $company): bool
    {
        $symbol = $company->getSymbol();
        return !empty($symbol) ;
    }


    public function validateStartDate(Company $company): bool
    {
        $startDate = $company->getStartDate();
        return !empty($startDate) ;
    }
    public function validateEndDate(Company $company): bool
    {
        $endDate = $company->getEndDate();
        return !empty($endDate) ;
    }
}
