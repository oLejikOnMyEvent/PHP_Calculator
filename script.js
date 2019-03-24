$(document).ready(function () {

    $('.btn_calculate').click(function () {
        calc()
    })

    $('.btn_clear').click(function () {
        $('.span_result').html(" ");
        $('.input_text').val(" ");
        $('.span_error').html(" ");
    })

});

function calc() {
    var str = $('.input_text').val();
    var numsFloat = /(-?\d+(?:\.\d+)?)\s*([-+*\/])\s*(-?\d+(?:\.\d+)?)/
    str = str.trim();

    

    var opFloat = str.match(numsFloat);
    console.log(opFloat)

    if (opFloat != null) {

   


    var a1 = opFloat[1];

    a1 = parseFloat(a1)

    var b1 = opFloat[3];
    b1 = parseFloat(b1);
    var op1 = opFloat[2];

  
    } else $('.span_error').html("Введите правильный числа")



    var result = 0;


    if (!isNaN(a1) && !isNaN(b1)) {

        
            // $.post("index.php", {
            //     a1: a1,
            //     b1: b1,
            //     op1: op1
            // }, function (result) {
            //     $(".span_result").html(result)
            // }, "json");
        
        switch (op1) {
            case "+":
                $('.span_result').html(result = a1 + b1)
                break;
            case "-":
                $('.span_result').html(result = a1 - b1)
                break;
            case "*":
                $('.span_result').html(result = a1 * b1)
                break;
            case "/":
                if (b1 == 0) {
                    $('.span_error').html("Ошика второго оператора. Делить на ноль нельзя")
                }
                else ($('.span_result').html(result = a1 / b1))
                break;
        }
    } else $('.span_error').html("Введите правильный числа")

}




