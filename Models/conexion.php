<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=travelhub","root","");
		return $link;

	}

}