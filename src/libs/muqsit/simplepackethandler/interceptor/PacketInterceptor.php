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

namespace iriss\libs\muqsit\simplepackethandler\interceptor;

use Closure;
use pocketmine\plugin\Plugin;

final class PacketInterceptor implements IPacketInterceptor {
	private readonly PacketInterceptorListener $listener;

	public function __construct(Plugin $register, int $priority, bool $handle_cancelled) {
		$this->listener = new PacketInterceptorListener($register, $priority, $handle_cancelled);
	}

	public function interceptIncoming(Closure $handler) : IPacketInterceptor {
		$this->listener->interceptIncoming($handler);
		return $this;
	}

	public function interceptOutgoing(Closure $handler) : IPacketInterceptor {
		$this->listener->interceptOutgoing($handler);
		return $this;
	}

	public function unregisterIncomingInterceptor(Closure $handler) : IPacketInterceptor {
		$this->listener->unregisterIncomingInterceptor($handler);
		return $this;
	}

	public function unregisterOutgoingInterceptor(Closure $handler) : IPacketInterceptor {
		$this->listener->unregisterOutgoingInterceptor($handler);
		return $this;
	}
}
