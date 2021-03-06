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
class CNPJValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof CNPJ) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\CNPJ');
        }
        if (null === $value || '' === $value) {
            return;
        }
        $valueNumber = preg_replace('/[^0-9]/', '', $value);
        if (strlen($valueNumber) != 14) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->addViolation();

            return;
        }
        for ($i = 0, $aux = 5, $count = 0; $i < 12; ++$i) {
            $count += $valueNumber{$i}
            * $aux;
            $aux = ($aux == 2)
                ? 9
                : $aux - 1;
        }
        $d1 = $count % 11;
        $d1 = $d1 < 2
            ? 0
            : 11 - $d1;
        if ($valueNumber{12} != $d1) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->addViolation();

            return;
        }
        for ($i = 0, $aux = 6, $count = 0; $i < 13; ++$i) {
            $count += $valueNumber{$i}
            * $aux;
            $aux = ($aux == 2)
                ? 9
                : $aux - 1;
        }
        $d2 = $count % 11;
        $d2 = $d2 < 2
            ? 0
            : 11 - $d2;
        if ($valueNumber{13} != $d2) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->addViolation();

            return;
        }
    }
}
