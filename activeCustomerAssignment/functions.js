document.getElementById("setCustomers").onclick = function(){
	var customers = document.getElementById("numCustomers").value;
	var arrayOfCustomers = [];
	if(parseInt(customers) && customers > 0){
		arrayOfCustomers = Array.from({length: customers}, function(){ return "<input class='inputMargins' name='customers[]'>";});
	}
	document.getElementById("customerInputs").innerHTML = `${arrayOfCustomers.length > 0 ? "Insert Customers: ":"" }<div>${arrayOfCustomers.join("<br/>")}</div>`;
}	
	