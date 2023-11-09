let paramA = '';
let paramB = '';
let paramC = '';

$(document).on('change', '.equation-value-input', function () {
   let currParam = $(this).attr('data-param');
   if (currParam === 'a') {
        paramA = '';
        if ($(this).val() === '0') {
            $('.error-block').html('значение не может быть равно нулю!');
            $(this).val('');
            $(this).focus();
            $('.equation-to-work').html('');
            return false;
        } else {
            paramA = "<span className='part-a'>";
            if ($(this).val() != '1') {
                paramA += $(this).val();
            }
            paramA += "</span>";
            paramA += "x<sup>2</sup>";
        }
   }
   if (currParam === 'b') {
       paramB = '';
       if ($(this).val() != '1') {
           if ($(this).val() < 0) {
               paramB += " - <span class='part-b'>";
               paramB += Math.abs($(this).val());
               paramB += "x</span>"
           }
           if ($(this).val() > 0) {
               paramB += " + <span class='part-b'>";
               paramB += Math.abs($(this).val());
               paramB += "x</span>"
           }
       } else {
           paramB += " + <span class='part-b'>x</span>";
       }
   }
   if (currParam === 'c') {
       paramC = '';
       if ($(this).val() < 0) {
           paramC += " - <span class='part-c'>";
           paramC += Math.abs($(this).val());
           paramC += "</span>"
       }
       if ($(this).val() > 0) {
           paramC += " + <span class='part-c'>";
           paramC += Math.abs($(this).val());
           paramC += "</span>"
       }
   }

   $('.equation-to-work').html(paramA + paramB + paramC + " = 0");
   $('.equation-to-work').show();

   $('.error-block').html('');
});

$('body').on('click', '.equation-value-input', function () {
   $(this).val('');
});

$('body').on('click', '.clear-inputs-btn', function () {
    $('.equation-value-input').val('');
    $('.equation-to-work').html('');
    $('.equation-values input[data-param="a"]').focus();
    paramA = '';
    paramB = '';
    paramC = '';
});

/** нажата кнопка решить уравнение */
$('body').on('click', '.btn-calculate', function () {
    let valueA = $('.equation-values input[data-param="a"]').val();
    let valueB = $('.equation-values input[data-param="b"]').val();
    let valueC = $('.equation-values input[data-param="c"]').val();

    let url = '/controllers/CalculateEquation.php';
    let data = {
        valueA: valueA,
        valueB: valueB,
        valueC: valueC
    };
    $.post(url, data).done(function (response) {

    });
});