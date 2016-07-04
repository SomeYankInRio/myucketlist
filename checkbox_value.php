<?php

	if(isset($_POST['submit'])){

	if(!empty($_POST['check_list'])) {

	

	//Counting number of checked checkboxes 

	$checked_count = count($_POST['check_list']);

	

	echo "You have selected following ".$checked_count." option(s): <br/>";

	

	//Loop to store and display values of individual checked checkbox
	
	
	
	
	
	

		foreach($_POST['check_list'] as $selected) {
			
			
			
		$ITEM_NAME=$selected;
		
		
		
		$sql = "INSERT INTO LIST".
      		 "(NUM_USER,
	   			ITEM_NAME,
				CATEGORY_NAME)".

       		"VALUES ('$NUM',
	    		'$ITEM_NAME',
				'$CAT_NAME')";
		
			
			
			

				echo "<p>$selected $NUM  $ITEM_NAME $CAT_NAME </p>"; 

		}

	echo "<br/> <span>now put them in the database,ok?</span>";	

	}

	else{

	echo "<b>Please Select Atleast One Option.</b>";

	}

	}

?>

