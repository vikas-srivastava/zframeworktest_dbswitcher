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
		// Include again to re-initialze the defaults
		require(BASE_PATH . '/sqlite3/_config.php');
		// run tests in memory, much faster - don't need ACID or persistence
		$databaseConfig['memory'] = true; 
		// Emulate SapphireTest::create_tmp_db() on envs where mysite/_config.php isn't modified, e.g. build slaves.
		if(!isset($databaseConfig['database']) || !$databaseConfig['database']) {
			$databaseConfig['database'] = 'tmpdb' . rand(1000000,9999999);
		}
	} else {
		// stick with default settings set through ConfigureFromEnv
	}
}