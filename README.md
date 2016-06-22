MeroBrValidatorBundle
=====================

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/fda4128e-3891-451b-80a9-a982365d1c7b/mini.png)](https://insight.sensiolabs.com/projects/fda4128e-3891-451b-80a9-a982365d1c7b)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/merorafael/MeroBrValidatorBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/merorafael/MeroBaseBundle/?branch=master)
[![Build Status](https://travis-ci.org/merorafael/MeroBrValidatorBundle.svg?branch=master)](https://travis-ci.org/merorafael/MeroBrValidatorBundle)
[![Latest Stable Version](https://poser.pugx.org/mero/br-validator-bundle/v/stable.svg)](https://packagist.org/packages/mero/br-validator-bundle)
[![Total Downloads](https://poser.pugx.org/mero/br-validator-bundle/downloads.svg)](https://packagist.org/packages/mero/br-validator-bundle)
[![License](https://poser.pugx.org/mero/br-validator-bundle/license.svg)](https://packagist.org/packages/mero/br-validator-bundle)

Bundle for Symfony with validators for Brazilian location.

Requeriments
------------

- PHP 5.5.9 or above
- Symfony 2.7 or above(including Symfony 3)

Instalation with composer
-------------------------

1. Open your project directory;
2. Run `composer require mero/br-validator-bundle` to add MeroBrValidatorBundle in your project vendor;
3. Open **my/project/dir/app/AppKernel.php**;
4. Add `Mero\Bundle\BrValidatorBundle\MeroBrValidatorBundle()`.

Symfony validators
------------------

| Applies to         | Options | Class | Validator | Description |
| -------------------| ------- | ----- | --------- | ----------- |
| [property or method](http://symfony.com/doc/current/book/validation.html#validation-property-target) | message | [CPF](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CPF.php)   | [CPFValidator](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CPFValidator.php)    | Validates number of CPF(individual registration)  |
| [property or method](http://symfony.com/doc/current/book/validation.html#validation-property-target) | message | [CNH](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CNH.php)   | [CNHValidator](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CNHValidator.php)    | Validates number of CNH(national driving license) |
| [property or method](http://symfony.com/doc/current/book/validation.html#validation-property-target) | message | [CNPJ](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CNPJ.php) | [CNPJValidator](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CNPJValidator.php)  | Validates number of CNPJ(corporate registration)  |

### Basic usage

```php
<?php

use Mero\Bundle\BrValidatorBundle\Validator\Constraints as BrAssert;

class People
{

    /**
     * @var string Brazilian individual registration
     *
     * @BrAssert\CPF()
     */
    private $cpf;

    /**
     * @var string Brazilian corporate registration
     *
     * @BrAssert\CNPJ()
     */
    private $cnpj;

    /**
     * @var string Brazilian national driving license
     *
     * @BrAssert\CNH()
     */
    private $driver;

}
```
