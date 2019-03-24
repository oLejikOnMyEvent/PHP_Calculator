<?php
if(isset($_POST["a1"]) && isset($_POST["b1"]) && isset($_POST["op1"]))
{
	require "functiones.php";

	$a1 = $_POST["a1"];
	$b1 = $_POST["b1"];
	$op1 = $_POST["op1"];
	if(!is_numeric($a1) || !is_numeric($b1)) 
	{
		$result = "Введите правильные числа";
	} 
	else 
	{
		
		switch ($op1)
		{
			case "+": $result = summa($a1, $b1); break;
			case "-": $result = minus($a1, $b1); break;
			case "*": $result = umnoj($a1, $b1); break;
			case "/":
				if($b1 != 0) {
					$result = deli($a1, $b1); 
				} else {
					$result = "<script type='text/javascript'>alert('Делить на 0 нельзя');</script>";
				}
				break;
			default: $result = "Введите правильные числа";
		}
	}
	
	echo json_encode($result);
	
    exit();
    }
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script>


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

        
            $.post("index.php", {
                a1: a1,
                b1: b1,
                op1: op1
            }, function (result) {
                $(".span_result").html(result)
            }, "json");
        

    } else $('.span_error').html("Введите правильный числа")

}
///
	$(document).ready(function () {

  $('.btn_clear').click(function () {
        $('.span_result').html(" ");
        $('.input_text').val(" ");
        $('.span_error').html(" ");
	})
})
	</script>
</head>

<body>
    <h1 style="text-align: center">
      Calculator EX
    </h1>


    <div class="calc"> 
        <div class="text"><input type="text" name="" id="" placeholder="" class="input_text"></div>
        <div class="calculate"> <button class="btn_calculate" onclick="calc()"> Подсчитать</button></div>
        <div class="result"> <span class="span_result"> </span></div>
        <div class="error_message"><span class="span_error"></span></div>
	
        <div class="clear"><button class="btn_clear">Очистить</button></div>

    </div>


</body>



</html>

