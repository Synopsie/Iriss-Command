<?php

declare(strict_types=1);

namespace iriss\parameters;

use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\types\command\CommandEnum;

use function array_keys;
use function array_map;
use function implode;
use function preg_match;
use function strtolower;

abstract class EnumParameter extends Parameters {
	/** @var string[]|bool[]|int[]|float[] */
	protected array $value = [];

	public function __construct(
		string $name,
		string $enumName,
		bool $isOptional = false
	) {
		parent::__construct($name, $isOptional);
		$this->getCommandParameter()->enum = new CommandEnum($enumName, $this->getEnumValues());
	}

	public function getNetworkType() : int {
		return -1;
	}

	public function canParse(string $argument, CommandSender $sender) : bool {
		return (bool) preg_match(
			"/^(" . implode("|", array_map('\\strtolower', $this->getEnumValues())) . ")$/iu",
			$argument
		);
	}

	public function addValue(string $string, bool|float|int|string $value) : void {
		$this->value[strtolower($string)] = $value;
	}

	public function getValue(string $string) : null|bool|float|int|string {
		return $this->value[strtolower($string)];
	}

	/**
	 * @return string[]|bool[]|int[]|float[]
	 */
	public function getEnumValues() : array {
		return array_keys($this->value);
	}

    public function getValues() : array {
        return $this->value;
    }

}
