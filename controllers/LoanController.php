<?php

namespace app\controllers;

use Yii;
use app\models\Loan;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;

class LoanController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionLoanForm()
    {
        $model = new Loan();

        return $this->render('loan-form', ['model' => $model]);
    }

    /**
     * @throws MethodNotAllowedHttpException
     */
    public function actionLoanFormHandler()
    {
        if (!Yii::$app->request->isPost) {
            throw new MethodNotAllowedHttpException();
        }

        $loan = new Loan();

        if (!$loan->load(Yii::$app->request->post()) && !$loan->validate()) {
            Yii::$app->session->setFlash('error', 'Проверьте корректность вводимых значений');

            return $this->redirect(Url::to(['loan/loan-form']));
        }

        $loan->save(false);

        Yii::$app->session->setFlash('success', 'Займ был создан');

        return $this->redirect(Url::to(['loan/loan', 'id' => $loan->id]));
    }

    public function actionLoans()
    {
        $loans = Loan::find()->all();

        return $this->render('loans', ['loans' => $loans]);
    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionLoan($id)
    {
        $loan = Loan::findOne($id);

        if ($loan === null) {
            throw new NotFoundHttpException('Займ не найден');
        }

        $i = $loan->annual_rate / 12 / 100;

        return $this->render('loan', ['loan' => $loan, 'i' => $i]);
    }
}
