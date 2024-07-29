<?php

declare(strict_types=1);

namespace iriss\parameters;

use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;

class PlayerParameter extends Parameters {

	public function getNetworkType() : int {
		return AvailableCommandsPacket::ARG_TYPE_TARGET;
	}

	public function canParse(string $argument, CommandSender $sender) : bool {
		return true;
	}

	public function parse(string $argument, CommandSender $sender) : string {
		return $argument;
	}

}
