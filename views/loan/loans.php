<?php
/** @var app\models\Loan[] $loans */

use yii\helpers\Url;

$this->title = 'Список всех займов';
?>
<h2>Список всех займов</h2><br>
<ul class="list-group">
    <?php foreach($loans as $loan): ?>
        <li class="list-group-item"><a href="<?= Url::to(['loan/loan', 'id' => $loan->id]) ?>">Займ №<?= $loan->id ?></a></li>
    <?php endforeach ?>
</ul>
