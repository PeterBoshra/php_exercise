<?php


namespace App\Tests\Service;

use App\Constants\CompanyValidationStatus;
use App\Entity\Company;
use App\Service\CompanyService;
use App\Service\CompanyValidator;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyValidatorTest extends TestCase
{
    protected function prepareCompanyObject()
    {
        $company = new Company();
        $company->setEmail("Peter@gmail.com");
        $company->setSymbol("ASED");
        $company->setStartDate(new \DateTime(date('Y-m-d H:i:s')));
        $company->setEndDate(new \DateTime(date('Y-m-d H:i:s')));

        return $company;
    }

    public function test_invalid_email()
    {
        $company = $this->prepareCompanyObject();
        $validationStatus = new CompanyValidationStatus();
        $validationStatus->isValid = false;
        $invalidEmails = ['', 'invalid_email'];
        $companyValidator = new CompanyValidator();
        foreach ($invalidEmails as $email) {
            $company->setEmail($email);
            $this->assertEquals($validationStatus->isValid, $companyValidator->validateCompany($company)->isValid);
        }
    }
    public function test_validate_email()
    {
        $company = $this->prepareCompanyObject();
        $validationStatus = new CompanyValidationStatus();
        $companyValidator = new CompanyValidator();
        $company->setEmail("peter.boshra4@gmail.com");
        $this->assertEquals($validationStatus->isValid , $companyValidator->validateCompany($company)->isValid);
    }
    public function test_invalid_symbol()
    {
        $company = $this->prepareCompanyObject();
        $validationStatus = new CompanyValidationStatus();
        $validationStatus->isValid = false;
        $invalidSymbols = [''];
        $companyValidator = new CompanyValidator();
        foreach ($invalidSymbols as $symbol) {
            $company->setSymbol($symbol);
            $this->assertEquals($validationStatus->isValid, $companyValidator->validateCompany($company)->isValid);
        }

    }
}
