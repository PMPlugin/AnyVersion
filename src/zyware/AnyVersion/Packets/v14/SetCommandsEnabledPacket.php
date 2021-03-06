<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace zyware\AnyVersion\Packets\v14;

#include <rules/DataPacket.h>


use pocketmine\network\mcpe\NetworkSession;

class SetCommandsEnabledPacket extends DataPacket{
	public const NETWORK_ID = ProtocolInfo::SET_COMMANDS_ENABLED_PACKET;

	/** @var bool */
	public $enabled;

	protected function decodePayload(){
		$this->enabled = $this->getBool();
	}

	protected function encodePayload(){
		$this->putBool($this->enabled);
	}

	public function handle(NetworkSession $session) : bool{
		return $session->handleSetCommandsEnabled($this);
	}
}
