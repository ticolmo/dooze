<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use DateTimeImmutable;

class AgeMinimal implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {   
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            
        $dateNaissance = new DateTimeImmutable($value);
        $aujourdhui = new DateTimeImmutable("now");
        $age = $aujourdhui->diff($dateNaissance)->format('%y');
        
        /* Âge minimal 16 ans */
        if($age<16){
            $fail(__('validation.age_minimal'))->translate();
        }
        }
    }
}
