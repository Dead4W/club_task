<?php

namespace app\common\controllers;

use app\common\enums\Operation;

class Calculator {
    static public function calculate(Operation $Operation, $a, $b) {
        $operationFunction = $Operation->getFunction();

        return self::{$operationFunction}($a, $b);
    }

    static public function operation_plus($a, $b) {
        return $a + $b;
    }

    static public function operation_minus($a, $b) {
        return $a - $b;
    }

    static public function operation_times($a, $b) {
        return $a * $b;
    }

    static public function operation_divide($a, $b) {
        return $a / $b;
    }


}
