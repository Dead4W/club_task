<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\common\controllers\Calculator;
use app\common\enums\Operation;

class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $result = "";

        $request = Yii::$app->request;

        // handle for not javascript browsers (and codeception)
        // If the submit button has been pressed
        if($request->isPost) {
            $data = AjaxController::actionCalculate();

            $result = $data['data'] ?? $data['error']['title'];
        }

        return $this->render('index', [
            "result" => $result,
        ]);
    }

    private static function validate($data) {
        foreach( $data as $param ) {
            if( $param === null || $param === "" ) return false;
        }
        return true;
    }
}
