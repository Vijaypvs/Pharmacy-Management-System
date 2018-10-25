<?php
session_start();
// Store Session Data
if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in']==1 and $_SESSION['User_type']!='Admin'){
		echo "<script type='text/javascript'>
 		alert('Please use Admin login to access this page');
 		location='index.html';
 		</script>";
	}
}
else {
    echo "<script type='text/javascript'>
 	alert('Please login');
 	location='index.html';
 	</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Retail Sale</title>
	<link rel="stylesheet" type="text/css" href="all.css">
	
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#fetch_customer_details').click(function(event) {
				event.preventDefault();
				var customer_ID=$('#customer_id').val();
				$.ajax({
					url:"load_customer_details.php",
					type:"post",
					data:{Cust_ID:customer_ID},
					success:function(cust_data) {
						var cust_details = cust_data.split('and');
						var cust_data1 = cust_details[0];
						var cust_data2 = cust_details[1];
    					$('#customer_name').val(cust_data1);
    					$('#customer_age').val(cust_data2);
					}
				});
			});
		$(document).ready(function(){
			$('#fetch_med_details').click(function(event) {
				event.preventDefault();
				var batch_no=$('#Batch_no').val();
				$.ajax({
					url:"load_med_details.php",
					type:"post",
					data:{Batch_no:batch_no},
					// datatype:"text",
					success:function(med_data) {
						var med_details = med_data.split('and');
						var med_data1 = med_details[0];
						var med_data2 = med_details[1];
						var med_data3 = med_details[2];
						var med_data4 = med_details[3];
						var med_data5 = med_details[4];
    					$('#med_id').val(med_data1);
    					$('#med_name').val(med_data2);
    					$('#available').val(med_data3);
    					$('#expiry_date').val(med_data4);
    					$('#med_mrp').val(med_data5);
					}
				});
			});
		});
		$(document).ready(function(){
			$('#add').click(function(event) {
				event.preventDefault();
				var quantity=$('#quantity').val();
				var mrp=$('#med_mrp').val();
				var result= quantity*mrp;
				$('#amount').val(result);
			});
		});
	});
	var qtyTotal = 0;
    var priceTotal = 0;
	function DeleteRow(row) {
	var i = row.parentNode.parentNode.rowIndex;
	var rTable = document.getElementById('display');
	var q=rTable.rows[i].cells[1].innerHTML;
	var p=rTable.rows[i].cells[3].innerHTML;
	qtyTotal=qtyTotal-q;
  document.getElementById("total_quantity").value=qtyTotal;
  priceTotal=priceTotal-p;
  document.getElementById("total_amount").value=priceTotal;
  	document.getElementById('display').deleteRow(i);

}
        function updateForm() {
            var product = document.getElementById("med_name").value;
            var qty = document.getElementById("quantity").value;
            var available=$('#available').val();
            if(available!=0){
			var exp_date=$('#expiry_date').val();
				var q = new Date();
				var m = q.getMonth()+1;
				var d = q.getDay();
				var y = q.getFullYear();
				var date = new Date(y,m,d);
				var mydate=new Date(exp_date);
			if(mydate>date){
            qtyTotal = qtyTotal + parseInt(qty);
            document.getElementById("total_quantity").value=qtyTotal;
            
            var price = document.getElementById("med_mrp").value;    
            var amount = document.getElementById("amount").value;
            priceTotal = priceTotal + parseInt(amount);
            document.getElementById("total_amount").value=priceTotal;
            var table=document.getElementById("display");
            var row=table.insertRow(1);
            var cell1=row.insertCell(0);
            var cell2=row.insertCell(1);
            var cell3=row.insertCell(2);
            var cell4=row.insertCell(3);
            var newcell=row.insertCell(4);
            cell1.innerHTML=product;
            cell2.innerHTML=qty;        
            cell3.innerHTML=price;      
            cell4.innerHTML=amount;
            newcell.innerHTML = "<INPUT type=\"button\" id=\"remove3\" value=\"Remove\" onclick=\"DeleteRow(this)\"/>";
        }
        else{
        	alert("Medicine expired.");
        }
    }
    else{
    	alert("Medicine not available");
    }
        }
        function bill(){
        	window.print();
        }
	</script>
</head>
<body>
	<div id="result" style="">
	<h1>Retail Sale</h1>
	<a href="admin.php"><input type="button" name="back" value="Back"></a>
	<hr>
	<form method="post">
		<label>Enter Customer ID: </label>
		<input type="text" id="customer_id">
		<label>Customer Name: </label>
		<input type="text" id="customer_name" disabled>
		<label>Age: </label>
		<input type="text" id="customer_age" disabled>
		<button type="button" id="fetch_customer_details">fetch</button>
		<br><br>
		<label>Batch No.: </label>
		<input type="text" id="Batch_no">
		<label>Medicine ID: </label>
		<input type="text" id="med_id" disabled>
		<label>Enter Medicine Name: </label>
		<input type="text" id="med_name" disabled>
		<button type="button" id="fetch_med_details">fetch</button>
		<br><br>
		<label>Quantity: </label>
		<input type="number" id="quantity">
		<label>Available</label>
		<input type="number" id="available" min="0" disabled><br><br>
		<label>Expiry Date: </label>
		<input type="date" id="expiry_date" disabled>
		<label>MRP: </label>
		<input type="number" id="med_mrp" disabled>
		<label>Amount: </label>
		<input type="text" id="amount" disabled>
		<button type="button" id="add">Calculate</button>
		<hr>
		<button type="button" id="add_in_table" onClick="updateForm()">Add</button>
		<input type="reset" id="clear" value="Clear">
		<br><br>
		<table id="display" border="1" cellspacing="0" cellpadding="10" width="100%" style="border: solid;border-radius: 5px;padding: 0;">
			<tr>
				<th>Medicine Name</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Amount</th>
				<th>Action</th>
			</tr>
		</table>
		<br><br>
		<label>Total Amount</label>
		<input type="number" id="total_amount" value="" disabled>
		<label>Total Products</label>
		<input type="number" id="total_quantity" value="" disabled>
		<br><br>
		<input type="submit" id="generate" value="Generate Bill" onClick="bill()">
	</form>
	</div>
</body>
</html>
