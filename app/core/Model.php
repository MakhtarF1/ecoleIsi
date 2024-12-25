<?php
abstract class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    protected function escape($value) {
        return $this->db->real_escape_string($value);
    }

    protected function query($sql) {
        return $this->db->query($sql);
    }
}