<?php namespace Config;

/**
 * Database Configuration
 *
 * @package Config
 */

class Database extends \CodeIgniter\Database\Config
{
	/**
	 * The directory that holds the Migrations
	 * and Seeds directories.
	 *
	 * @var string
	 */
	public $filesPath = APPPATH . 'Database/';

	/**
	 * Lets you choose which connection group to
	 * use if no other is specified.
	 *
	 * @var string
	 */
	public $defaultGroup = 'default';

	/**
	 * The default database connection.
	 *
	 * @var array
	 */
	public $default = [
		'DSN'      => 'postgres://uqgigokyrilpek:9284d7cc4c490a4a56fd7cc39fc12f721cf8afb83d48f36d621cae6d5c6be999@ec2-34-251-118-151.eu-west-1.compute.amazonaws.com:5432/d1n4e2g36qn17j',
		'hostname' => 'ec2-34-251-118-151.eu-west-1.compute.amazonaws.com',
		'username' => 'uqgigokyrilpek',
		'password' => '9284d7cc4c490a4a56fd7cc39fc12f721cf8afb83d48f36d621cae6d5c6be999',
		'database' => 'd1n4e2g36qn17j',
		'DBDriver' => 'Postgre',
		'DBPrefix' => '',
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'cacheOn'  => false,
		'cacheDir' => '',
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 5432,
	];

	/**
	 * This database connection is used when
	 * running PHPUnit database tests.
	 *
	 * @var array
	 */
	public $tests = [
		'DSN'      => '',
		'hostname' => '127.0.0.1',
		'username' => '',
		'password' => '',
		'database' => ':memory:',
		'DBDriver' => 'SQLite3',
		'DBPrefix' => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'cacheOn'  => false,
		'cacheDir' => '',
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3306,
	];

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();

		// Ensure that we always set the database group to 'tests' if
		// we are currently running an automated test suite, so that
		// we don't overwrite live data on accident.
		if (ENVIRONMENT === 'testing')
		{
			$this->defaultGroup = 'tests';

			// Under Travis-CI, we can set an ENV var named 'DB_GROUP'
			// so that we can test against multiple databases.
			if ($group = getenv('DB'))
			{
				if (is_file(TESTPATH . 'travis/Database.php'))
				{
					require TESTPATH . 'travis/Database.php';

					if (! empty($dbconfig) && array_key_exists($group, $dbconfig))
					{
						$this->tests = $dbconfig[$group];
					}
				}
			}
		}
	}

	//--------------------------------------------------------------------

}
