<?php

namespace Mero\Bundle\BrValidatorBundle\Tests\Validator\Constraints;

use Mero\Bundle\BrValidatorBundle\Validator\Constraints\CNH;
use Mero\Bundle\BrValidatorBundle\Validator\Constraints\CNHValidator;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest;
use Symfony\Component\Validator\Validation;

class CNHValidatorTest extends AbstractConstraintValidatorTest
{
    protected function getApiVersion()
    {
        return Validation::API_VERSION_2_5;
    }

    protected function createValidator()
    {
        return new CNHValidator();
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, new CNH());
        $this->assertNoViolation();
    }

    public function testEmptyStringIsValid()
    {
        $this->validator->validate('', new CNH());
        $this->assertNoViolation();
    }

    public function getInvalidCNHs()
    {
        return [
            ['12651316461'],
            ['14397322871'],
            ['14375711312'],
            ['12996843266'],
            ['14375711511'],
            ['12615113411'],
            ['13247161316'],
            ['11258751259'],
            ['11739751581'],
            ['13375637514'],
            ['12542551342'],
            ['11718111411'],
            ['11836511948'],
            ['14365445978'],
            ['14324384312'],
            ['14339482949'],
            ['11136521151'],
            ['11612581127'],
            ['11613454741'],
            ['14129251992'],
            ['13411741211'],
            ['13417248311'],
            ['11671431345'],
            ['13292694415'],
            [''],
            ['F265F3F6461'],
            ['F439732287F'],
            ['F43757F13F2'],
            ['F2996843266'],
            ['F43757FF5F1'],
            ['F26F511341F'],
            ['F3247F613F6'],
            ['F125875F259'],
            ['FF73975158F'],
            ['F33756375F4'],
            ['F2542551342'],
            ['F17F81114FF'],
            ['FF83651F948'],
            ['F4365445978'],
            ['F43243843F2'],
            ['F4339482949'],
            ['F1F3652FF5F'],
            ['F1612581F27'],
            ['FF6F345474F'],
            ['F4129251992'],
            ['F34F174F2F1'],
            ['F34172483F1'],
            ['FF67F431345'],
            ['F32926944F5'],
            ['00265003006461'],
            ['0043973228700'],
            ['00437570013002'],
            ['002996843266'],
            ['004375700005001'],
            ['00260051134100'],
            ['00324700613006'],
            ['0012587500259'],
            ['00007397515800'],
            ['0033756375004'],
            ['002542551342'],
            ['001700811140000'],
            ['00008365100948'],
            ['004365445978'],
            ['0043243843002'],
            ['004339482949'],
            ['0010036520000500'],
            ['0016125810027'],
            ['000060034547400'],
            ['004129251992'],
            ['003400174002001'],
            ['0034172483001'],
            ['00006700431345'],
            ['0032926944005'],
        ];
    }

    /**
     * @dataProvider getInvalidCNHs
     */
    public function testInvalidCNHs($cnh)
    {
        $constraint = new CNH(array(
            'message' => 'testMessage',
        ));
        $this->validator->validate($cnh, $constraint);
        $this->buildViolation('testMessage')
            ->setParameter('{{ value }}', '"'.$cnh.'"')
            ->assertRaised();
    }

    public function getValidCNHs()
    {
        return [
            ['02650306461'],
            ['04397322870'],
            ['04375701302'],
            ['02996843266'],
            ['04375700501'],
            ['02605113410'],
            ['03247061306'],
            ['01258750259'],
            ['00739751580'],
            ['03375637504'],
            ['02542551342'],
            ['01708111400'],
            ['00836510948'],
            ['04365445978'],
            ['04324384302'],
            ['04339482949'],
            ['01036520050'],
            ['01612581027'],
            ['00603454740'],
            ['04129251992'],
            ['03401740201'],
            ['03417248301'],
            ['00670431345'],
            ['03292694405'],
        ];
    }

    /**
     * @dataProvider getValidCNHs
     */
    public function testValidCNHs($cnh)
    {
        $this->validator->validate($cnh, new CNH());
        $this->assertNoViolation();
    }
}
