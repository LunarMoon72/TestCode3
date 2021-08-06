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
  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
   switch($cmd->getName()){
     case "test":
       if($sender->hasPermission("test.cmd")){
         if(!$sender instanceof Player){
           $sender->sendMessage("This Command Only Works for players! Please perform this command IN GAME!");
         }else{
           if(!isset($args[0]) or (is_int($args[0]) and $args[0] > 0)){ 
            $args[0] = 4; 
           }
           $sender->getInventory()->addItem(Item::get(364,0,$args[0]));
           $sender->sendMessage("You have just recieved" .count($args[0]). " steak!");
         }
       }else{
         $sender->sendMessage("You don't have permission to use this command");
       }
     break;
  }
  return true;
}
