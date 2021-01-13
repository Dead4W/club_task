<?php

namespace app\common\controllers;

use app\common\enums\Operation;

class Calculator {
    static public function calculate($operation_id, $a, $b) {
        $operation = array_search($operation_id, Operation::$id);

        if( $operation ) {
            return self::$operation($a, $b);
        } else {
            return false;
        }
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
