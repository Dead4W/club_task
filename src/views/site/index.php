<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\common\enums\Operation;
use yii\web\View;

$this->title = 'Test_task';
?>
<div class="site-index">
    <!-- Calculator form -->
    <?= Html::beginForm([''], 'post', ['class' => '__form', 'data' => ['method' => 'calculate']]) ?>
        <input name="number1" type="text" class="form-control" style="width: 150px; display: inline" />
        <select name="operation_id">
            <?php

            for ( $i = 0; $i < count(Operation::$id);$i++ ) {
                $mark = Operation::$mark[$i];
                $title = Operation::$title[$i];

                ?>
                <option value="<?php echo $i ?>" data-value="<?php echo $mark ?>"><?php echo $title ?></option>
                <?php
            }

            ?>
        </select>
        <input name="number2" type="text" class="form-control" style="width: 150px; display: inline" />
        <input name="submit" type="submit" value="Calculate" class="btn btn-primary" />
        <?= Html::csrfMetaTags() ?>
    <?= Html::endForm() ?>

    <h2 id="result"><?php echo $result ?></h2>

    <?php

    $this->registerJsFile(
        '@web/js/main.js',
        ['depends' => [\yii\web\JqueryAsset::className()]]
    );

    ?>

</div>
