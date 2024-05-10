<?php

/**
 * Test: Nette\Database\Connection: reflection
 * @dataProvider? databases.ini  sqlsrv
 */

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/connect.inc.php'; // create $connection

Nette\Database\Helpers::loadFromFile($connection, __DIR__ . '/files/sqlsrv-nette_test3.sql');


$reflection = $connection->getReflection();
$columns = $reflection->getTable('types')->columns;

$expectedColumns = [
	'bigint' => [
		'name' => 'bigint',
		'table' => 'types',
		'nativeType' => 'BIGINT',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'binary_3' => [
		'name' => 'binary_3',
		'table' => 'types',
		'nativeType' => 'BINARY',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'bit' => [
		'name' => 'bit',
		'table' => 'types',
		'nativeType' => 'BIT',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'char_5' => [
		'name' => 'char_5',
		'table' => 'types',
		'nativeType' => 'CHAR',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'date' => [
		'name' => 'date',
		'table' => 'types',
		'nativeType' => 'DATE',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'datetime' => [
		'name' => 'datetime',
		'table' => 'types',
		'nativeType' => 'DATETIME',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'datetime2' => [
		'name' => 'datetime2',
		'table' => 'types',
		'nativeType' => 'DATETIME2',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'decimal' => [
		'name' => 'decimal',
		'table' => 'types',
		'nativeType' => 'DECIMAL',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'float' => [
		'name' => 'float',
		'table' => 'types',
		'nativeType' => 'FLOAT',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'geography' => [
		'name' => 'geography',
		'table' => 'types',
		'nativeType' => 'GEOGRAPHY',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'geometry' => [
		'name' => 'geometry',
		'table' => 'types',
		'nativeType' => 'GEOMETRY',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'hierarchyid' => [
		'name' => 'hierarchyid',
		'table' => 'types',
		'nativeType' => 'HIERARCHYID',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'int' => [
		'name' => 'int',
		'table' => 'types',
		'nativeType' => 'INT',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'money' => [
		'name' => 'money',
		'table' => 'types',
		'nativeType' => 'MONEY',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'nchar' => [
		'name' => 'nchar',
		'table' => 'types',
		'nativeType' => 'NCHAR',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'ntext' => [
		'name' => 'ntext',
		'table' => 'types',
		'nativeType' => 'NTEXT',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'numeric_10_0' => [
		'name' => 'numeric_10_0',
		'table' => 'types',
		'nativeType' => 'NUMERIC',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'numeric_10_2' => [
		'name' => 'numeric_10_2',
		'table' => 'types',
		'nativeType' => 'NUMERIC',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'nvarchar' => [
		'name' => 'nvarchar',
		'table' => 'types',
		'nativeType' => 'NVARCHAR',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'real' => [
		'name' => 'real',
		'table' => 'types',
		'nativeType' => 'REAL',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'smalldatetime' => [
		'name' => 'smalldatetime',
		'table' => 'types',
		'nativeType' => 'SMALLDATETIME',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'smallint' => [
		'name' => 'smallint',
		'table' => 'types',
		'nativeType' => 'SMALLINT',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'smallmoney' => [
		'name' => 'smallmoney',
		'table' => 'types',
		'nativeType' => 'SMALLMONEY',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'text' => [
		'name' => 'text',
		'table' => 'types',
		'nativeType' => 'TEXT',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'time' => [
		'name' => 'time',
		'table' => 'types',
		'nativeType' => 'TIME',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'tinyint' => [
		'name' => 'tinyint',
		'table' => 'types',
		'nativeType' => 'TINYINT',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'uniqueidentifier' => [
		'name' => 'uniqueidentifier',
		'table' => 'types',
		'nativeType' => 'UNIQUEIDENTIFIER',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'varbinary' => [
		'name' => 'varbinary',
		'table' => 'types',
		'nativeType' => 'VARBINARY',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'varchar' => [
		'name' => 'varchar',
		'table' => 'types',
		'nativeType' => 'VARCHAR',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
	'xml' => [
		'name' => 'xml',
		'table' => 'types',
		'nativeType' => 'XML',
		'size' => null,
		'nullable' => true,
		'default' => null,
		'autoIncrement' => false,
		'primary' => false,
	],
];

Assert::same(
	$expectedColumns,
	array_map(fn($c) => [
		'name' => $c->name,
		'table' => $c->table->name,
		'nativeType' => $c->nativeType,
		'size' => $c->size,
		'nullable' => $c->nullable,
		'default' => $c->default,
		'autoIncrement' => $c->autoIncrement,
		'primary' => $c->primary,
	], $columns),
);
