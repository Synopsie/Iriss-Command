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

namespace iriss;

use iriss\listener\CommandListener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
	protected function onEnable() : void {
        new CommandListener($this);
	}

}
