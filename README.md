MeroBrValidatorBundle
=====================

Bundle for Symfony with validators for Brazilian location.

Requeriments
------------

- PHP 5.5.9 or above
- Symfony 2.7 or above(including Symfony 3)

Instalation with composer
-------------------------

1. Open your project directory;
2. Run `composer require mero/br-validator-bundle` to add MeroBrValidatorBundle in your project vendor;
3. Run `composer update command`;
4. Open **my/project/dir/app/AppKernel.php**;
6. Add `Mero\Bundle\BrValidatorBundle\MeroBrValidatorBundle()`.

Symfony validators
------------------

| Applies to         | Options | Class | Validator | Description |
| -------------------| ------- | ----- | --------- | ----------- |
| [property or method](http://symfony.com/doc/current/book/validation.html#validation-property-target) | message | [CNPJ](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CNPJ.php) | [CNPJValidator](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CNPJValidator.php)  | Validates number of CNPJ |
| [property or method](http://symfony.com/doc/current/book/validation.html#validation-property-target) | message | [CPF](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CPF.php)   | [CPFValidator](https://github.com/merorafael/MeroBrValidatorBundle/blob/master/Validator/Constraints/CPFValidator.php)    | Validates number of CPF  |

### Basic usage

```php
<?php

use Mero\Bundle\BrValidatorBundle\Validator\Constraints as BrAssert;

class People
{

    /**
     * @BrAssert\CPF()
     */
    private $cpf;

    /**
     * @BrAssert\CNPJ()
     */
    private $cnpj;

}
```
