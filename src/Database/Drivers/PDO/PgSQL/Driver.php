<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette\Database\Drivers\PDO\PgSQL;

use Nette\Database\Drivers;


/**
 * PDO PostgreSQL database driver.
 */
class Driver implements Drivers\Driver
{
	private const EngineClass = Drivers\PgSqlDriver::class;


	public function createDatabaseEngine(): Drivers\Engine
	{
		return new (self::EngineClass)();
	}
}
