<?php
class Connect {
    static $host = 'localhost';
    static $user = 'root';
    static $pw = '';
    static $db = 'ourproj';
    private $cnx; // Store the connection

    public function __construct() {
        // Initialize the connection once
        $this->cnx = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pw);
        $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function selectdata($r) {
        // Use the stored connection to execute the query
        return $this->cnx->query($r);
    }

    public function updatedata($r) {
        // Use the stored connection to execute the query
        return $this->cnx->exec($r);
    }

    public function lastInsertId() {
        // Return the last inserted ID
        return $this->cnx->lastInsertId();
    }
}
?>
