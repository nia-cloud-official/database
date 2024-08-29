<?php

/**
 * Test: Nette\Database\Connection exceptions.
 * @dataProvider? databases.ini  mysql
 */

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$connection = connectToDB();
Nette\Database\Helpers::loadFromFile($connection, __DIR__ . "/files/{$driverName}-nette_test1.sql");

test('Exception thrown for invalid database credentials', function () {
	$options = Tester\Environment::loadData();
	$e = Assert::exception(
		fn() => new Nette\Database\Explorer($options['dsn'], 'unknown', 'unknown'),
		Nette\Database\ConnectionException::class,
		'%a% Access denied for user %a%',
		1045,
	);
	Assert::contains($e->getSqlState(), ['HY000', '28000']);
});


test('Exception thrown when calling rollback with no active transaction', function () use ($connection) {
	$e = Assert::exception(
		fn() => $connection->rollback(),
		Nette\Database\DriverException::class,
		'There is no active transaction',
		0,
	);
	Assert::null($e->getSqlState());
});


test('Exception thrown for syntax error in SQL query', function () use ($connection) {
	$e = Assert::exception(
		fn() => $connection->query('SELECT'),
		Nette\Database\DriverException::class,
		'%a% Syntax error %a%',
		1064,
	);
	Assert::same('42000', $e->getSqlState());
});


test('Exception thrown for unique constraint violation', function () use ($connection) {
	$e = Assert::exception(
		fn() => $connection->query('INSERT INTO author (id, name, web, born) VALUES (11, "", "", NULL)'),
		Nette\Database\UniqueConstraintViolationException::class,
		'%a% Integrity constraint violation: %a%',
		1062,
	);
	Assert::same('23000', $e->getSqlState());
});


test('Exception thrown for not null constraint violation', function () use ($connection) {
	$e = Assert::exception(
		fn() => $connection->query('INSERT INTO author (name, web, born) VALUES (NULL, "", NULL)'),
		Nette\Database\NotNullConstraintViolationException::class,
		'%a% Integrity constraint violation: %a%',
		1048,
	);
	Assert::same('23000', $e->getSqlState());
});


test('Exception thrown for foreign key constraint violation', function () use ($connection) {
	$e = Assert::exception(
		fn() => $connection->query('INSERT INTO book (author_id, translator_id, title) VALUES (999, 12, "")'),
		Nette\Database\ForeignKeyConstraintViolationException::class,
		'%a% a foreign key constraint fails %a%',
		1452,
	);
	Assert::same('23000', $e->getSqlState());
});
