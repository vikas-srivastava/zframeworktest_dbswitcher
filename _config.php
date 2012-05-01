<?php
Session::start();
if(@$_GET['db']) {
	$db = $_GET['db'];
} elseif(@$_SESSION['db']) {
	$db = $_SESSION['db'];
} else {
	$db = null;
}
if($db) {
	global $databaseConfig;
	if($db == 'mysql') {
		$databaseConfig['type'] = 'MySQLDatabase';
		$databaseConfig['server'] = SS_MYSQL_DATABASE_SERVER;
		$databaseConfig['username'] = SS_MYSQL_DATABASE_USERNAME;
		$databaseConfig['password'] = SS_MYSQL_DATABASE_PASSWORD;
	} else if($db == 'postgresql') {
		$databaseConfig['type'] = 'PostgreSQLDatabase';
		$databaseConfig['server'] = SS_PGSQL_DATABASE_SERVER;
		$databaseConfig['username'] = SS_PGSQL_DATABASE_USERNAME;
		$databaseConfig['password'] = SS_PGSQL_DATABASE_PASSWORD;
	} else if($db == 'mssql') {
		$databaseConfig['type'] = 'MSSQLDatabase';
		$databaseConfig['server'] = SS_MSSQL_DATABASE_SERVER;
		$databaseConfig['username'] = SS_MSSQL_DATABASE_USERNAME;
		$databaseConfig['password'] = SS_MSSQL_DATABASE_PASSWORD;
	} else if($db == 'sqlite3') {
		$databaseConfig['type'] = 'SQLite3Database';
	} else {
		// stick with default settings set through ConfigureFromEnv
	}
}