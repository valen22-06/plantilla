<?php
class Connection {
    private $host;
    private $user;
    private $pass;
    private $database;
    private $port;
    private $link;

    public function __construct() {
        $this->setConnect(); 
        $this->connect();
    }

    private function setConnect() {
        require_once 'conf.php';

        $this->host = $host ?? "localhost";
        $this->user = $user ?? "postgres";
        $this->pass = $pass ?? "1234";
        $this->port = $port ?? "5432";
        $this->database = $database ?? "geovisor";
    }

    private function connect() {
        // Construir la cadena de conexión
        $connection_string = "host={$this->host} port={$this->port} dbname={$this->database} user={$this->user} password={$this->pass}";

        // Usar la cadena de conexión
        $this->link = pg_connect($connection_string);

        // Verificar si la conexión fue exitosa
        if ($this->link) {
            // echo "Conexión exitosa<br>";
        } else {
            die("Error al conectar a la base de datos: " . pg_last_error());
        }
    }

    public function getConnect() {
        return $this->link;
    }

    public function close() {
        pg_close($this->link);
    }
}
?>
