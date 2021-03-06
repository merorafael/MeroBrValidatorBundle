<?php

namespace Mero\Bundle\BrValidatorBundle\Tests\Validator\Constraints;

use Mero\Bundle\BrValidatorBundle\Validator\Constraints\CPF;
use Mero\Bundle\BrValidatorBundle\Validator\Constraints\CPFValidator;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest;
use Symfony\Component\Validator\Validation;

/**
 */
class CPFValidatorTest extends AbstractConstraintValidatorTest
{
    protected function getApiVersion()
    {
        return Validation::API_VERSION_2_5;
    }

    protected function createValidator()
    {
        return new CPFValidator();
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, new CPF());
        $this->assertNoViolation();
    }

    public function testEmptyStringIsValid()
    {
        $this->validator->validate('', new CPF());
        $this->assertNoViolation();
    }

    public function getInvalidCPFs()
    {
        return [
            ['111.111.111-11'],
            ['222.222.222-22'],
            ['398.682.528-23'],
        ];
    }

    /**
     * @dataProvider getInvalidCPFs
     */
    public function testInvalidCPFs($cpf)
    {
        $constraint = new CPF(array(
            'message' => 'testMessage',
        ));
        $this->validator->validate($cpf, $constraint);
        $this->buildViolation('testMessage')
            ->setParameter('{{ value }}', '"'.$cpf.'"')
            ->assertRaised();
    }

    public function getValidCPFs()
    {
        return [
            ['398.682.528-22'],
            ['534.005.933-20'],
            ['235.515.623-93'],
        ];
    }

    /**
     * @dataProvider getValidCPFs
     */
    public function testValidCPFs($cpf)
    {
        $this->validator->validate($cpf, new CPF());
        $this->assertNoViolation();
    }
}
