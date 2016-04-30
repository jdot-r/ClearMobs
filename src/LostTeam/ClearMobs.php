<?php
namespace LostTeam;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\DroppedItem;
use pocketmine\Player;


class ClearMobs extends PluginBase {
  public function $Title = (TF::BLUE."[".TF::GREEN."ClearMobs".TF::BLUE."]".TF::YELLOW." ");
  public function onEnable() {
    $this->getLogger()->notice(TF::GREEN."Enabled!");
  }
  public function onCommand(CommandSender $sender, Command $command, $list, array $args) {
    if(strtolower($command) === "cm" or strtolower($command) === "clearmobs") {
      $Count = $this->removeMobs();
      $sender->sendMessage($this->Title."Removed ".$Count." mobs!");
      return true;
    }
    if(strtolower($command) === "ca" or strtolower($command) === "clearall") {
      $Count = $this->removeEntities();
      $sender->sendMessage($this->Title."Removed ".$Count." entities!");
      return true;
    }
  }
  public function removeEntities() {
    $i = 0;
    foreach($this->getServer()->getLevels() as $level) {
      foreach($level->getEntities() as $entity) {
        if(!$entity instanceof Player) {
          $entity->close();
          $i++;
        }
      }
    }
    return $i;
  }
  public function removeMobs() {
    $i = 0;
    foreach($this->getServer()->getLevels() as $level) {
      foreach($level->getEntities() as $entity) {
        if(!$entity instanceof Player or !$entity instanceof DroppedItem) {
          $entity->close();
          $i++;
        }
      }
    }
    return $i;
  }
  public function onDisable() {
    $this->getLogger()->notice(TF::GREEN."Disabled!");
  }
}
