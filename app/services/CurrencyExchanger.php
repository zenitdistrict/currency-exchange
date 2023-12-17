<?php

namespace app\services;

use app\models\Currency;

class CurrencyExchanger
{
    public function exchange($currencyCode, $value)
    {
        $defaultCurrency = \Yii::$app->params['defaultCurrency'];

        if ($currencyCode == $defaultCurrency) {
            $resultCurrencies = [
                [
                    'code' => \Yii::$app->params['defaultCurrency'],
                    'value' => $value,
                ]
            ];
            return array_merge($resultCurrencies, $this->exchangeByDefaultCurrency($value));
        }

        return $this->exchangeByCurrency($currencyCode, $value);
    }

    private function exchangeByDefaultCurrency($value, $exception = null)
    {
        $resultCurrencies = [];
        $exchangeCurrencies = Currency::find()
            ->where(['code' => \Yii::$app->params['currencies']])
            ->all();

        foreach ($exchangeCurrencies as $currency) {
            if ($exception != $currency->code) {
                $exchangeValue = round(
                    $value / ($currency->value / $currency->nominal),
                    4
                );
                $resultCurrencies[] = [
                    'code' => $currency->code,
                    'value' => $exchangeValue,
                ];
            }
        }

        return $resultCurrencies;
    }

    private function exchangeByCurrency($currencyCode, $value)
    {
        $currency = Currency::findOne(['code' => $currencyCode]);
        $valueForDefaultCurrency = round(
            $value / $currency->nominal * $currency->value,
            4
        );
        $resultCurrencies = [
            [
                'code' => \Yii::$app->params['defaultCurrency'],
                'value' => $valueForDefaultCurrency,
            ]
        ];

        return array_merge($resultCurrencies, $this->exchangeByDefaultCurrency($valueForDefaultCurrency, $currencyCode));
    }
}
