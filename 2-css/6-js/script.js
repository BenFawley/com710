function handleForm1(){
    var message = document.getElementById("input-message").value
    alert(message);
}

function calculate(){
    var num1 = document.getElementById("number1").value
    var num2 = document.getElementById("number2").value
    var result = Number(num1) + Number(num2);
    alert(result)

}

function combo(){
    var num1 = document.getElementById("firstNumber").value
    var num2 = document.getElementById("secondNumber").value
    var op = document.getElementById("operator").value
    var result = 0;
    
    if (op == "*"){
        result = parseInt(num1) * parseInt(num2);
    }
    
    else if (op=="/"){
        result = parseInt(num1) / parseInt(num2);
    }

    else if (op=="-"){
        result = parseInt(num1) - parseInt(num2);
    }
    else {
        result = parseInt(num1) + parseInt(num2);

    }

    alert(result)



}

document.getElementById('form1-submit').onclick = function(){
    handleForm1();
}

document.getElementById('submit-num').onclick = function(){
    calculate();
}

document.getElementById('submit-combo').onclick = function(){
    combo();
}
