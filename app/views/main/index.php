<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css" type="text/css" media="all">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src='./js/main.js' defer></script>
</head>
<body>
<div id="container">
    <div class="content">
        <div class="calc-container">
            <div class="calc-header">Решение квадратных уравнений</div>
            <div class="calc-content">
                <div><i>ax</i><sup>2</sup> + <i>bx</i> + <i>c</i> = 0 </div>
                <div class="equation-values">
                    <i>a</i> = <input type="number" value="" class="equation-value-input" data-param="a">
                    <i>b</i> = <input type="number" value="" class="equation-value-input" data-param="b">
                    <i>c</i> = <input type="number" value="" class="equation-value-input" data-param="c">
                    <span class="clear-inputs-btn">Очистить</span>
                </div>
                <div class="equation-to-work"></div>
                <span class="error-block"></span>
                <div class="btn-calculate-block">
                    <span id="equation-calculate" class="calc-btn btn-calculate">Решить уравнение</span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>