<?php

namespace LunarMoon72;

use pocketmine\plugin\PluginBase;

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\event\Listener;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

class Main extends PluginBase{
   public function onEnabled(){
   	$this->getServer()->getPluginManager()->registerEvents($this,$this);
   	$this->getLogger()->info("Plugin is Enabled");

   }
   
   public function onDisabled(){
   	$this->getLogger()->info("Plugin is Disabled");
   }
   public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
   	switch($cmd->getName()){
   		case "test":
   		  $sender->sendMessage("This is a test cmd!");
   		break;
   	}
    return true;
   }
}
