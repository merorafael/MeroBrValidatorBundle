<?php

namespace Mero\Bundle\BrValidatorBundle\Validator\Constraints;

use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @author Rafael Mello <merorafael@gmail.com>
 *
 * @api
 */
class CNHValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof CNH) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\CNH');
        }
        if (null === $value || '' === $value) {
            return;
        }
        $valueNumber = preg_replace('/[^0-9]/', '', $value);
        if (strlen($valueNumber) != 11) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->addViolation();

            return;
        }
        if (!preg_match('/(?!(\d)\1{10})\d{11}/', $valueNumber)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->addViolation();

            return;
        }
        $dsc = 0;
        for ($i = 0, $j = 9, $v = 0; $i < 9; ++$i, --$j) {
            $v += (int) $valueNumber[$i] * $j;
        }
        if (($vl1 = $v % 11) >= 10) {
            $vl1 = 0;
            $dsc = 2;
        }
        for ($i = 0, $j = 1, $v = 0; $i < 9; ++$i, ++$j) {
            $v += (int) $valueNumber[$i] * $j;
        }
        $vl2 = ($x = ($v % 11)) >= 10 ? 0 : $x - $dsc;
        if (sprintf('%d%d', $vl1, $vl2) != substr($valueNumber, -2)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->addViolation();

            return;
        }

    }
}
