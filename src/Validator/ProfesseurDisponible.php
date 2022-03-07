<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;


#[\Attribute] class ProfesseurDisponible extends Constraint {
    public $message = 'Ce professeur dispense déjà un cours sur ce créneau horaire.';

    public function getTargets() {
        return self::CLASS_CONSTRAINT;
    }
}