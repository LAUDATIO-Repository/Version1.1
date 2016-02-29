
<?php
		//Formular erstellen:
		echo '<form method="post">';
		echo '<strong>Open Object:</strong><br />PID:<input type="input" name="openpid" value="'.htmlentities($openpid,ENT_QUOTES,"UTF-8").'"/>';
		echo '<input type="submit" name="method" value="GET"/>';
		echo '<input type="submit" name="method" value="DELETE"/><br />';
		#echo 'PARAM:<input type="text" name="postparam" value="'.$postparam.'"/>';
		echo '<input type="submit" name="method" value="PUT"/>';
		echo '<br /><strong>Create Object:</strong><br />PID:
			  <input type="input" name="createpid" value="'.$createpid.'"/><br />';
		echo 'Label:<input type="input" name="createlabel" value="'.$createlabel.'"/>';
		echo '<input type="submit" name="method" value="POST"/><br />';
		$checked = ($showHeader) ? 'checked' : '';
		echo '<input type="checkbox" '.$checked.' name="showHeader" value="showHeader"/>HTTP-Header anzeigen';
		echo '</form>';
		
		echo '<form enctype="multipart/form-data" action="request" method="POST">';
    	echo '<input type="hidden" name="MAX_FILE_SIZE" value="300000" />';
    	#<!-- Der Name des Input Felds bestimmt den Namen im $_FILES Array -->
   		echo 'Diese Datei hochladen: <input name="userfile" type="file" />';
    	echo '<input type="submit" value="Send File" /></form>';
		

		echo '<br /><div style="text-decoration:underline;font-weight:bold;">Antwort des Aufrufs</div><br />';
		echo '<div style="border:1px solid gray;">';
		echo $response;
		echo '</div>';
?>
