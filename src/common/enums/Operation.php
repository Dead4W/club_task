<?php

namespace app\common\enums;

class Operation
{
    // name function in Calculator::class
    public static $id = [
        "operation_plus" => 0,
        "operation_minus" => 1,
        "operation_times" => 2,
        "operation_divide" => 3,
    ];

    public static $mark = ["+", "-", "*", "/"];

    public static $title = [
        "Plus",
        "Minus",
        "Times",
        "Divide",
    ];
}