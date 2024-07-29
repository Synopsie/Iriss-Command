<?php

/*
 *  ____   __   __  _   _    ___    ____    ____    ___   _____
 * / ___|  \ \ / / | \ | |  / _ \  |  _ \  / ___|  |_ _| | ____|
 * \___ \   \ V /  |  \| | | | | | | |_) | \___ \   | |  |  _|
 *  ___) |   | |   | |\  | | |_| | |  __/   ___) |  | |  | |___
 * |____/    |_|   |_| \_|  \___/  |_|     |____/  |___| |_____|
 *
 * Cet API permet de gérer de manière facile les webhooks/message envoyés sur discord.
 *
 * @author SynopsieTeam
 * @link https://neta.arkaniastudios.com/
 * @version 2.0.1
 *
 */

declare(strict_types=1);

namespace iriss\parameters;

use InvalidArgumentException;
use pocketmine\command\CommandSender;

class BooleanParameter extends EnumParameter {
	public function __construct(string $name, string $enumName, bool $isOptional = false) {
		parent::__construct($name, $enumName, $isOptional);
		$this->addValue('on', true);
		$this->addValue('off', false);
	}

	public function parse(string $argument, CommandSender $sender) : bool {
		$value = $this->getValue($argument);
		if ($value === null) {
			throw new InvalidArgumentException('Invalid boolean value');
		}
		return $value;
	}

}
