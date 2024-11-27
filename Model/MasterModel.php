<?php
    
    include_once '../Lib/conf/conection.php';

    Class MasterModel extends Connection{
        public function consult($sql) {
            $result = pg_query($this->getConnect(), $sql);
            if (!$result) {
                die("Error en la consulta: " . pg_last_error());
            }
        
            $result = pg_fetch_all($result);
            return $result ? $result : [];
        }

        public function insert($sql) {
            $result = pg_query($this->getConnect(), $sql);
            if (!$result) {
                die("Error en la consulta de inserción: " . pg_last_error());
            }
            return pg_affected_rows($result) > 0; // Verifica si se afectaron filas
        }
        
        public function update($sql) {
            $result = pg_query($this->getConnect(), $sql);
            if (!$result) {
                die("Error en la consulta de actualización: " . pg_last_error());
            }
            return pg_affected_rows($result) > 0; // Verifica si se afectaron filas
        }
        
        public function delete($sql) {
            $result = pg_query($this->getConnect(), $sql);
            if (!$result) {
                die("Error en la consulta de eliminación: " . pg_last_error());
            }
            return pg_affected_rows($result) > 0; // Verifica si se afectaron filas
        }
        

        public function autoIncrement($table, $field) {
            $sql = "SELECT nextval(pg_get_serial_sequence('$table', '$field'))";
            $result = pg_query($this->getConnect(), $sql);
        
            if (!$result) {
                die("Error al obtener el siguiente valor de la secuencia: " . pg_last_error());
            }
        
            $resp = pg_fetch_row($result);
            return $resp[0];
        }
        
    
    }

?>