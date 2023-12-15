<?php

namespace app\commands;

use app\models\Currency;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\httpclient\Client;

class CurrencyController extends Controller
{
    /**
     * Parses currencies.
     * @return int Exit code
     */
    public function actionParse()
    {
        echo "Start parsing";

        $date = (new \DateTime(''))->format('d/m/Y');
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $date)
            ->send();

        //TODO: refactor using 'ON DUPLICATE KEY UPDATE'
        foreach ($response->data['Valute'] as $data) {
            $currency = Currency::findOne(['code' => $data['CharCode']]);

            if (!$currency) {
                $currency = new Currency();
                $currency->code = $data['CharCode'];
            }

            $currency->name = $data['Name'];
            $currency->nominal = $data['Nominal'];
            $currency->value = str_replace(',', '.', $data['Value']);
            $currency->save();
        }

        echo "End parsing";

        return ExitCode::OK;
    }
}
