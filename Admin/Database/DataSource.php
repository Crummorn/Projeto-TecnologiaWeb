<?php

class DataSource {
	private static $instance = null;
	private static $host = "localhost";
	private static $username = "root";
	private static $password = "";
	private static $dbName = "loja";

	public static function getConexao() {
		if(!isset(self::$instance)):
			try {
				self::$instance = new mysqli(self::$host, self::$username, self::$password, self::$dbName);
			} catch (Exception $erro) {
				echo "Ocorreu um erro ao conectar-se com o Banco de Dados do Sistema! <br>";
				echo $erro->getMessage();
			}
		endif;

		return self::$instance;
	}
}