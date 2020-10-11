var $ = function (id) {
    return document.getElementById(id); 
};

function init(){
    $("subtotal").focus();
    $("clear").onclick = clear;
    $("subtotal").onclick = function(){
        $("subtotal").value = "";
    };
    $("tax_rate").onclick = function(){
        $("tax_rate").value="";
    }
}

function processEntries(){
    var sub_total= parseFloat($("subtotal").value);
    var tax_rate = parseFloat($("tax_rate").value);
    
    if(sub_total<0 || sub_total>10000 || tax_rate<0 || tax_rate>12){
        alert("Subtotal must be > 0 and < 10000 \nTax rate must be > 0 and <12");
        $("subtotal").value = "";
        $("tax_rate").value = "";
    }
    
    //Calculation
    var sales_tax = sub_total * tax_rate / 100;
    var total = sub_total + sales_tax;
    
    //Display result
    $("sales_tax").value = sales_tax;
    $("total").value = total;
    $("subtotal").focus();
}

var clear = function(){
    $("subtotal").value = "";
    $("tax_rate").value="";
    $("subtotal").focus();
}
