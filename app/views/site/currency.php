<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/currency.js"></script>
<link href="/css/currency.css" rel="stylesheet">
<link href="/css/currency1.css" rel="stylesheet">
<link href="/css/currency2.css" rel="stylesheet">


<div class="container main-container xxx-main-container ">
    <div class="xxx-top-content xxx-top-content--bg-transparent xxx-top-content--p-b-20 ">
        <div class="xxx-container">
            <div class="xxx-top-content__inner">
                <div class="xxx-currency-grid xxx-currency-grid--alt-grid">
                    <div class="xxx-currency-grid__block xxx-currency-grid__block--separately ">
                        <div class="xxx-line-h-1 xxx-mb-15">
                            <a href="https://bankiros.ru/converter" class="xxx-text-bold xxx-fs-18 xxx-g-link xxx-g-link--no-bd">
                                Конвертер валют ЦБ РФ
                            </a>
                        </div>
                        <div class="xxx-tab-list-wrap xxx-tab-list-wrap--pt-0 xxx-tab-list-wrap--only-border-light xxx-mb-15">
                            <ul class="xxx-tab__list xxx-tab__list--fix-scrollbar xxx-tab__list--overflow-auto">
                                <li class="xxx-tab__item xxx-tab__item--p-b-5 active" data-tab="today">
                                    <span class="xxx-fs-14"> Сегодня </span>
                                </li>
                            </ul>
                        </div>
                        <div class="xxx-tab__content">
                            <div class="xxx-tab__body active" id="today">
                                <div class="blk-grid-content blk-grid-content--gap-10 ">
                                    <?php foreach ($currencies as $currency): ?>
                                    <div class="xxx-input-converter ">
                                        <input value="<?= $currency['value'] ?>"
                                               id="<?= $currency['code'] ?>"
                                               data-input-converter=""
                                               data-cur-name="<?= $currency['code'] ?>"
                                               data-cur-multiplier="1" type="tel"
                                               inputmode="decimal"
                                               class="xxx-input-converter__input xxx-full-width">
                                        <span class="xxx-input-converter__before-text"> <?= $currency['code'] ?> </span>
                                        <img class="xxx-input-converter__img" src="/images/<?= $currency['code'] ?>.svg" alt="<?= $currency['code'] ?>-icon">
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>