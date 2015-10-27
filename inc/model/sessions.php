<?php
//SESSIONS
namespace sessions;

function message() {
    if(isset($_SESSION["message"]))
        {
            echo htmlentities($_SESSION["message"]);
            
            $_SESSION["message"] = null;
        }
}

function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];
			
			// clear message after use
			$_SESSION["errors"] = null;
			
			return $errors;
		}
	}

?>