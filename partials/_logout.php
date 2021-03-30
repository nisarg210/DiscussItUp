<?php
session_start();

echo " Please wait......Logging you out!! ";
session_destroy();
header("Location: /Forum")
?>