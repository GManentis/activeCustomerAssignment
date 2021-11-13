<?php
function mostActive($numCustomers, $customers){
	if(!is_array($customers)){
		return "Please insert valid customers<br><br><a href='./'>Click here to return</a>";
	}
	
	if(!filter_var($numCustomers, FILTER_VALIDATE_INT) || $numCustomers < 1 || $numCustomers >10000){
		return "Please set valid number of customers<br><br><a href='./'>Click here to return</a>";
	}
	
	if(count($customers) != $numCustomers){
		return "Inserted customers and customer number mismatch<br><br><a href='./'>Click here to return</a>";
	}
	
	$position = 1;
	foreach($customers as $customer){
		if(!$customer){
			return "Invalid customer entry at position No".$position."<br><br><a href='./'>Click here to return</a>";
		}
		
		if(strlen($customer) < 1 || strlen($customer) > 20){
			return "Invalid customer name length at position No".$position."<br><br><a href='./'>Click here to return</a>";
		}
		
		if (!preg_match('/[A-Z]/', substr($customer,0,1))) {
		  return "First letter in not uppercase English of customer at position No".$position."<br><br><a href='./'>Click here to return</a>";
		}
		
		if (!preg_match("#^[a-z]*$#", substr($customer,1))) {
		  return "Invalid name for customer at position No".$position.". Except for first letter the name should consist only of english characters<br><br><a href='./'>Click here to return</a>";
		}
		++$position;
	}

	$customer_appearances = array_count_values($customers);
	ksort($customer_appearances);
	foreach($customer_appearances as $c_name=>$number){
		if($number/count($customers) < 0.05){
			unset($customer_appearances[$c_name]);
		}
	}
	
	if(empty($customer_appearances)){
		return "No customer is above the threshold<br><br><a href='./'>Click here to return</a>";
	}
	$customer_appearances = array_keys($customer_appearances);
	return "Customers above the threshold are:<br><br>".implode("<br/>",$customer_appearances)."<br><br><a href='./'>Click here to return</a>";	
}
?>