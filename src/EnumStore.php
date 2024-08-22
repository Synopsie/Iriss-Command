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

namespace iriss;

use pocketmine\network\mcpe\protocol\types\command\CommandEnum;
use pocketmine\network\mcpe\protocol\UpdateSoftEnumPacket;
use pocketmine\Server;

class EnumStore {
	/** @var CommandEnum[] */
	private static array $enum = [];

	public static function getEnum(string $name) : ?CommandEnum {
		return self::$enum[$name] ?? null;
	}

	/**
	 * @return CommandEnum[]
	 */
	public static function getEnums() : array {
		return self::$enum;
	}

	public static function addEnum(CommandEnum $enum) : void {
		self::$enum[$enum->getName()] = $enum;
		self::broadcastEnum($enum, UpdateSoftEnumPacket::TYPE_ADD);
	}

	public static function broadcastEnum(CommandEnum $enum, int $type) : void {
		$pk           = new UpdateSoftEnumPacket();
		$pk->enumName = $enum->getName();
		$pk->values   = $enum->getValues();
		$pk->type     = $type;
		foreach (Server::getInstance()->getOnlinePlayers() as $player) {
			$player->getNetworkSession()->sendDataPacket($pk);
		}
	}

}
