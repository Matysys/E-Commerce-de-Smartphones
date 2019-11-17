<?php
session_start();
session_unset();
session_destroy();
echo "Saindo...";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<meta http-equiv='refresh' content='0.1;URL=index.php'>";
?>