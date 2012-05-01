## Overview

Allows to specify the database through a query parameter,
which is useful when testing different databases on the same SilverStripe instance, mainly for compatibility and regression checks.

**IMPORTANT: Not intended for production usage** Vital system configuration is set by user input in this module, so it should be used on internal testing instances only.

It is technically part of the [frameworktest](https://github.com/silverstripe-labs/silverstripe-frameworktest) module. Due to the lacking module inclusion priorities, the module has to alphabetically appear after "mysite", where the `$databaseConfig` is initially set.

## Usage

To run tests on a specific database, simply add the `db` query parameter:

	sake dev/tests/all db=sqlite3

Note that when executing through the `phpunit` binary,
an empty parameter has to be forced.

	phpunit sapphire/tests/ "" db=sqlite3

## Configuration

Relies on constants being defined in an `_ss_environment.php` file:

	// mysql
	define('SS_DATABASE_SERVER','');
	define('SS_DATABASE_USERNAME','');
	define('SS_DATABASE_PASSWORD','');

	// postgresql
	define('SS_PGSQL_DATABASE_SERVER','');
	define('SS_PGSQL_DATABASE_USERNAME','');
	define('SS_PGSQL_DATABASE_PASSWORD','');

	// mssql
	define('SS_MSSQL_DATABASE_SERVER', '');
	define('SS_MSSQL_DATABASE_USERNAME', '');
	define('SS_MSSQL_DATABASE_PASSWORD', '');