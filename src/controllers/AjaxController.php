<?php

namespace app\controllers;

use app\common\enums\ErrorResponse;
use app\common\enums\Operation;
use Exception;
use phpDocumentor\Reflection\Types\String_;
use Yii;
use yii\web\Controller;
use app\common\controllers\Calculator;

class AjaxController extends Controller
{

    public function beforeAction($action)
    {
        // add json response
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return true;
    }

    /**
     * Displays homepage.
     *
     * @return array
     */
    static public function actionCalculate()
    {

        $request = Yii::$app->request;

        if($request->isPost)
        {
            $operation_id = $request->post("operation_id");
            $a = $request->post("number1");
            $b = $request->post("number2");

            // check params is not empty and isset
            if( !self::validate([$a, $b, $operation_id]) ) {
                return self::_responseBad(ErrorResponse::$EMPTY_PARAM);
            }

            $Operation = Operation::getById($operation_id);

            if( $Operation === false ) {
                return self::_responseBad(ErrorResponse::$UNDEFINED_METHOD);
            }

            // divide by zero exception
            try {
                $total = Calculator::calculate($Operation, $a, $b);
            } catch (Exception $e) {
                return self::_responseBad(ErrorResponse::$DIVIDE_BY_ZERO);
            }

            // check undefined operation
            if( $total === false ) {
                // Print error message
                return self::_responseBad(ErrorResponse::$UNDEFINED_METHOD);
            } else {
                $mark = $Operation->getMark();
                return self::_responseGood("{$a} {$mark} {$b} = {$total}");
            }
        }

        return self::_responseBad(ErrorResponse::$UNDEFINED_METHOD);
    }

    private static function _responseGood($data) {
        return [
            'status' => 1,
            'data' => $data
        ];
    }

    private static function _responseBad(ErrorResponse $error) {
        return [
            'status' => 0,
            'error' => [
                "code" => $error->getCode(),
                "title" => $error->getTitle(),
            ]
        ];
    }

    private static function validate($data) {
        foreach( $data as $param ) {
            if( $param === null || $param === "" ) return false;
        }
        return true;
    }
}
