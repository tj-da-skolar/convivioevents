<?php
if($_POST["message"]) {
    mail("trixie_luz@yahoo.com", "Form to email message", $_POST["comment"], "From: trixie_luz@yahoo.com");
}
?>	