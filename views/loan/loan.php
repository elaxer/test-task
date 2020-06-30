<?php
/** @var app\models\Loan $loan */
/** @var int $i */

use yii\helpers\Html;

$this->title = "Займ № {$loan->id}";
?>
<h2>Займ № <?= Html::encode($loan->id) ?></h2>
<b>Начальная дата:</b> <?= Html::encode((new DateTime($loan->date))->format('d.m.Y')) ?> <br>
<b>Сумма займа:</b> <?= Html::encode($loan->amount) ?> <br>
<b>Срок займа:</b> <?= Html::encode($loan->term) ?> <br>
<b>Годовая процентная ставка:</b> <?= Html::encode($loan->annual_rate) ?> <br>

<hr>
<h2 class="text-center">График</h2><br>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Номер платежа</th>
        <th>Дата платежа</th>
        <th>Общая сумма платежа</th>
        <th>Сумма погашаемых процентов</th>
        <th>Сумма погашаемого основного долга</th>
        <th>Остаток основного долга</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $a = pow(1 + $i, $loan->term);
            $k = ($i * $a) / ($a - 1);

            // Общая сумма платежа
            $payment = round($k * $loan->amount, 2);

            // Остаток
            $balance = round($loan->amount, 2);

            for ($j = 1; $j <= $loan->term; $j++):
        ?>
        <tr class="text-center">
            <td><?= $j ?></td>
            <td><?= (new DateTime($loan->date))->add(new DateInterval("P{$j}M"))->format('d.m.Y') ?></td>
            <td><?= $payment ?></td>
            <td>
                <?php
                    $percents = round($balance * $i, 2);
                    // Погашаемые проценты
                    echo $percents;
                ?>
            </td>
            <td>
                <?php
                    // Погашаемый основной долг
                    $debt = $payment - $percents;
                    echo $debt;
                ?>
            </td>
            <td>
                <?php
                    $balance = round($balance - $debt, 2);
                    echo $balance;
                ?>
            </td>
        </tr>
        <?php endfor ?>
    </tbody>
</table>