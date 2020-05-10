<?php

/*
Created by Zwarts Development
*/

namespace rzwarts74\TestPlugin;

use pocketmine\command\{Command as Cmd, CommandSender};
use pocketmine\utils\Config;
use pocketmine\Player;
use rzwarts74\TestPlugin\Main;

class Command extends Cmd {

	private $main;

	public function __construct(Main $main){
		$this->plugin = $main;
		parent::__construct("testplugin", "Just test if it works!", "/testplugin <string: message>");
		$this->setPermission("testplugin.command");
	}

	public function execute(CommandSender $player, string $commandLabel, array $args) : void{
		$this->p = $this->plugin;
		if(!$player instanceof Player){
			if($args == ""){
				if($this->p->getServer()->getOnlinePlayers() == null){
					$this->p->getServer()->getLogger()->info("[KickAll] - There are not any players to kick!");
				}else{
					foreach($this->p->getServer()->getOnlinePlayers() as $players){
						$players->kick("", false);
					}
					$this->p->getServer()->getLogger()->info("[KickAll] - All players kicked!");
				}
			}else{
				if($this->p->getServer()->getOnlinePlayers() == null){
					$this->p->getServer()->getLogger()->info("[KickAll] - There are not any players to kick!");
				}else{
					foreach($this->p->getServer()->getOnlinePlayers() as $players){
						$players->kick(implode(" ", $args), false);
					}
					$this->p->getServer()->getLogger()->info("[KickAll] - All players kicked!");
				}
			}
		}else{
			if(!$this->testPermission($player)) return;
			if($args == ""){
				foreach($this->p->getServer()->getOnlinePlayers() as $players){
					$players->kick("", true);
				}
			}else{
				foreach($this->p->getServer()->getOnlinePlayers() as $players){
					$players->kick(implode(" ", $args), true);
				}
			}
			$this->p->getServer()->getLogger()->info("[KickAll] - All players kicked by \"" . $player->getName(). "\"!");
		}
	}
}
