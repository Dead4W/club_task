<?php

namespace app\common\enums;

use app\common\Enum;

class ErrorResponse extends Enum
{
    public static $EMPTY_PARAM;
    public static $DIVIDE_BY_ZERO;
    public static $UNDEFINED_METHOD;

    /* custom data getters */

    function getCode() {
        return $this->getId();
    }

    function getTitle() {
        return $this->data;
    }
}

// register
ErrorResponse::$EMPTY_PARAM = new ErrorResponse(0, "Some param is empty");
ErrorResponse::$DIVIDE_BY_ZERO = new ErrorResponse(1, "Divide by zero error");
ErrorResponse::$UNDEFINED_METHOD = new ErrorResponse(2, "undefined method");

ErrorResponse::init();