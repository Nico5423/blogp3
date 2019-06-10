<?php

if (!empty($_GET['id'])) 
	{
		echo 'le post appelé est le numero ' . ($_GET['id']);
	}
	
        
    else 

	{
    echo 'Pas de numéro de post';
	}
?>
