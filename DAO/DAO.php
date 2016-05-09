<?php

include_once(__DIR__.'/../BD/Conexion.php');
interface DAO{
    public static function getAll($cond,$args);
    public static function save($obj);
    public static function update($obj);
    public static function delete($id);
    public static function get($id);
}