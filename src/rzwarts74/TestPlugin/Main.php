<?php

/*
Created by AmmyCoding
Twitter: @AmmyR
*/

namespace rzwarts74\TestPlugin;

use pocketmine\plugin\PluginBase;
use rzwarts74\TestPlugin\Command;

class Main extends PluginBase {

	public function onEnable() : void{
		$this->getServer()->getCommandMap()->register("testplugin", new Command($this));
	}

}
