<?php
declare(strict_types=1);

namespace iriss\parameters;

use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;

class FloatParameter extends Parameters {

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
        return AvailableCommandsPacket::ARG_TYPE_FLOAT;
    }

    public function canParse(string $argument, CommandSender $sender) : bool {
        if ($this->acceptsNegative) {
            return (bool) preg_match('/^-?\d+(\.\d+)?$/', $argument);
        }
        return (bool) preg_match('/^\d+(\.\d+)?$/', $argument);
    }

    public function parse(string $argument, CommandSender $sender) : float {
        return (float) $argument;
    }

}