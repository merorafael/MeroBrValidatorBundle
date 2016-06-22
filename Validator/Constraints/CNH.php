<?php

namespace Mero\Bundle\BrValidatorBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Rafael Mello <merorafael@gmail.com>
 *
 * @api
 */
class CNH extends Constraint
{
    public $message = 'CNH {{ value }} is not valid';
}
