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
 * @author Synopsie
 * @link https://iriss.arkaniastudios.com/
 * @version 2.0.0
 *
 */

declare(strict_types=1);

namespace iriss;

use iriss\listener\CommandListener;
use pocketmine\plugin\Plugin;

class IrissCommand {
	private static bool $isRegister = false;

	public static function register(Plugin $plugin) : bool {
		if(self::$isRegister) {
			return false;
		}
		new CommandListener($plugin);
		self::$isRegister = true;
		return true;
	}

}
