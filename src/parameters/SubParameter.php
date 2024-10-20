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

use iriss\EnumStore;
use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;
use pocketmine\network\mcpe\protocol\types\command\CommandEnum;
use pocketmine\network\mcpe\protocol\types\command\CommandParameter;

use function strtolower;

class SubParameter extends Parameters {
	public function __construct(
		string $name,
		bool $isOptional = false
	) {
		parent::__construct($name, $isOptional);
		$this->getCommandParameter()->paramType = AvailableCommandsPacket::ARG_FLAG_VALID | AvailableCommandsPacket::ARG_FLAG_ENUM;
		EnumStore::addEnum($this->getCommandParameter()->enum = new CommandEnum(strtolower($name), [strtolower($name)]));
	}

	public function getNetworkType() : int {
		return CommandParameter::FLAG_FORCE_COLLAPSE_ENUM;
	}

	public function canParse(string $argument, CommandSender $sender) : bool {
		return true;
	}

	public function parse(string $argument, CommandSender $sender) : mixed {
		return $argument;
	}

}
