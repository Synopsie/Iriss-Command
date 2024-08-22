<?php

/*
 *  ____   __   __  _   _    ___    ____    ____    ___   _____
 * / ___|  \ \ / / | \ | |  / _ \  |  _ \  / ___|  |_ _| | ____|
 * \___ \   \ V /  |  \| | | | | | | |_) | \___ \   | |  |  _|
 *  ___) |   | |   | |\  | | |_| | |  __/   ___) |  | |  | |___
 * |____/    |_|   |_| \_|  \___/  |_|     |____/  |___| |_____|
 *
 * API permettant de simplifier l'utilisation des commandes et d'avoir une autocompletion
 *
 * @author Synopsie
 * @link https://gtihub.com/Synopsie
 * @version 2.1.0
 *
 */

declare(strict_types=1);

namespace iriss\parameters;

use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;

use function preg_match;

class IntParameter extends Parameters {
	private bool $acceptsNegative;

	public function __construct(
		string $name,
		bool $acceptsNegative = false,
		bool $isOptional = false
	) {
		parent::__construct($name, $isOptional);
		$this->acceptsNegative = $acceptsNegative;
	}

	public function getNetworkType() : int {
		return AvailableCommandsPacket::ARG_TYPE_INT;
	}

	public function canParse(string $argument, CommandSender $sender) : bool {
		if ($this->acceptsNegative) {
			return (bool) preg_match('/^[-+]?\d+$/', $argument);
		}
		return (bool) preg_match('/^\d+$/', $argument);

	}

	public function parse(string $argument, CommandSender $sender) : int {
		return (int) $argument;
	}

}
