<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = fopen( 'users.json', 'w' );
    fwrite( $file, $_POST['management']);
    fclose( $file );
}
?>