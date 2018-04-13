<?php
/**
 * Created by PhpStorm.
 * User: Administracion1
 * Date: 18/10/2017
 * Time: 14:40
 */

$nombre = ".env";

/*$archivo = fopen($nombre, "r");
while (!feof($archivo)) {
    $fila = fgets($archivo);
    echo $fila.'<br/>';
}
fclose($archivo);*/


/*$db_connection = "sqlserver";
$db_host = "127.0.0.1";
$db_port = "3306";
$db_database = "mybase";
$db_username = "usuario";
$db_password = "123456";

$config = "\n\nDB_CONNECTION=".$db_connection."\nDB_HOST=".$db_host."\nDB_PORT=".$db_port."\nDB_DATABASE=".$db_database."\nDB_USERNAME=".$db_username."\nDB_PASSWORD=".$db_password;

//echo $config;

$archivo = fopen($nombre, "a+");
fputs($archivo, $config);
fclose($archivo);
*/


$config_hosts = "'connections' => [";

$directorio = "database.php";


$databaseConfig = fopen($directorio, "r");
/*while (!feof($databaseConfig)) {
    $fila = fgets($databaseConfig);

    echo $fila . '<br/>';
}*/
$contenido = file_get_contents($directorio);
$pos = strpos($contenido, $config_hosts);
//echo $pos;

$pos += strlen($config_hosts) + 10;

fseek($databaseConfig, $pos); //seteo la posicion en el puntero del archivo

$subcadena = substr($contenido, $pos); //obtengo el resto del archivo a partir de la posicion

echo $subcadena;

/*while (!feof($databaseConfig)) {
    $fila = fgets($databaseConfig);

    echo $fila . '<br/>';
}*/

fclose($databaseConfig);