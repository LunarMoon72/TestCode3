<?php

namespace LunarMoon72\TestCode3;

use pocketmine\plugin\PluginBase;

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\event\Listener;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener{
   public function onEnabled(){
   	$this->getServer()->getPluginManager()->registerEvents($this,$this);
   	$this->getLogger()->info("Plugin is Enabled");

   }
   
   public function onDisabled(){
   	$this->getLogger()->info("Plugin is Disabled");
   }
   public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args Player $player) : bool{
   	switch($cmd->getName()){
   		case "test":
   		 if($player->hasPermission("testcode4.cmd")){
   		 	if(!sender instanceof Player){
   		 		$sender->sendMessage("This command is for players!");
   		 	}else{
   		 		if(!isset($args[0]) or (is_int($args[0]) > 0)){
   		 			$args[0] = 4;
   		 		}
   		 		$sender->getInventory()->addItem(Item::get(364,0,$args[0]));
   		 		$sender->sendMessage("You have just recieved" .count($args[0]). " steak!");
   		 	}  

   		 }
   		break;
   	}
      return true;
   }
}
