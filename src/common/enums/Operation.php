<?php

namespace app\common\enums;

use app\common\Enum;

class Operation extends Enum
{
    public static $PLUS;
    public static $MINUS;
    public static $TIMES;
    public static $DIVIDE;

    /* custom data getters */

    function getTitle() {
        return $this->data[0];
    }

    function getMark() {
        return $this->data[1];
    }

    function getFunction() {
        return $this->data[2];
    }
}

// register
Operation::$PLUS = new Operation(0, ['Plus', "+", "operation_plus"]);
Operation::$MINUS = new Operation(1, ["Minus", "-", "operation_minus"]);
Operation::$TIMES = new Operation(2, ["Times", "*", "operation_times"]);
Operation::$DIVIDE = new Operation(3, ["Divide", "/", "operation_divide"]);

Operation::init();

/*
 * Usage:
 *
 * Operation::$PLUS->getId();
 * Operation::$PLUS->getTitle();
 * Operation::$PLUS->getMark();
 *
 * or find by id
 * return false if Operation not find
 * $operation = Operation::getById(1);
 *
 * $operation->getId();
 * $operation->getTitle();
 * $operation->getMark();
 */