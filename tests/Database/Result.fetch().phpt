<?php

/**
 * Test: Nette\Database\Result::fetch()
 * @dataProvider? databases.ini
 */

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$connection = connectToDB();
Nette\Database\Helpers::loadFromFile($connection, __DIR__ . "/files/{$driverName}-nette_test1.sql");


test('', function () use ($connection, $driverName) {
	$res = $connection->query('SELECT name, name FROM author');
	$message = match ($driverName) {
		'mysql' => "Found duplicate columns in database result set: 'name'.",
		'pgsql' => "Found duplicate columns in database result set: 'name'%a%",
		'sqlite' => "Found duplicate columns in database result set: 'name'.",
		'sqlsrv' => "Found duplicate columns in database result set: 'name'.",
		default => Assert::fail("Unsupported driver $driverName"),
	};

	Assert::error(
		fn() => $res->fetch(),
		E_USER_NOTICE,
		$message,
	);

	$res->fetch();
});


test('tests closeCursor()', function () use ($connection, $driverName) {
	if ($driverName === 'mysql') {
		$connection->query('CREATE DEFINER = CURRENT_USER PROCEDURE `testProc`(IN param int(10) unsigned) BEGIN SELECT * FROM book WHERE id != param; END;;');
		$connection->getConnection()->getNativeConnection()->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

		$res = $connection->query('CALL testProc(1)');
		foreach ($res as $row) {
		}

		$res = $connection->query('SELECT * FROM book');
		foreach ($res as $row) {
		}
	}
});


test('', function () use ($connection, $driverName) {
	$res = $connection->query('SELECT book.id, author.id, author.name, translator.name FROM book JOIN author ON (author.id = book.author_id) JOIN author translator ON (translator.id = book.translator_id)');
	$message = match ($driverName) {
		'mysql' => "Found duplicate columns in database result set: 'id', 'name'.",
		'pgsql' => "Found duplicate columns in database result set: 'id'%a% 'name'%a%",
		'sqlite' => "Found duplicate columns in database result set: 'id', 'name'.",
		'sqlsrv' => "Found duplicate columns in database result set: 'id', 'name'.",
		default => Assert::fail("Unsupported driver $driverName"),
	};

	Assert::error(
		fn() => $res->fetch(),
		E_USER_NOTICE,
		$message,
	);
});


test('', function () use ($connection, $driverName) {
	$res = $connection->query('SELECT id FROM author WHERE id = ?', 666);

	Assert::null($res->fetch());
});
