<?php

namespace Mero\Bundle\BrValidatorBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * @author Rafael Mello <merorafael@gmail.com>
 *
 * @api
 */
class CPFValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof CPF) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\CPF');
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
        for ($t = 9; $t < 11; ++$t) {
            for ($d = 0, $c = 0; $c < $t; ++$c) {
                $d += $valueNumber{$c}
                * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($valueNumber{$c} != $d) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ value }}', $this->formatValue($value))
                    ->addViolation();

                return;
            }
        }
    }
}
