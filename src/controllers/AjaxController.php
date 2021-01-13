<?php

namespace app\controllers;

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
     * @return string
     */
    static public function actionCalculate()
    {

        $request = Yii::$app->request;

        if($request->isPost)
        {
            $operation = $request->post("operation_id");
            $a = $request->post("number1");
            $b = $request->post("number2");

            // check params is not empty and isset
            if( !self::validate([$a, $b, $operation]) ) {
                return self::_response('Some param is empty');
            }

            // divide by zero exception
            try {
                $total = Calculator::calculate($operation, $a, $b);
            } catch (Exception $e) {
                return self::_response('Divide by zero error');
            }

            // check undefined operation
            if( $total === false ) {
                // Print error message
                return self::_response('undefined operation');
            } else {
                $mark = Operation::$mark[$operation];
                return self::_response("{$a} {$mark} {$b} = {$total}");
            }
        }

        return self::_response('undefined operation');
    }
    private static function _response($data) {
        return [
            'status' => 1,
            'data' => $data
        ];
    }

    private static function validate($data) {
        foreach( $data as $param ) {
            if( $param === null || $param === "" ) return false;
        }
        return true;
    }
}
