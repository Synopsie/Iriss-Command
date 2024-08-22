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

class StringParameter extends Parameters {
	public function getNetworkType() : int {
		return AvailableCommandsPacket::ARG_TYPE_STRING;
	}

	public function canParse(string $argument, CommandSender $sender) : bool {
		return true;
	}

	public function parse(string $argument, CommandSender $sender) : string {
		return $argument;
	}
}
