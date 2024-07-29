<?php
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