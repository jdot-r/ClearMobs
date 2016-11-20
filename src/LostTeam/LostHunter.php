<?php
namespace LostTeam;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;

class LostHunter extends PluginBase {
  public $Title = (TF::BLUE."[".TF::GREEN."ClearMobs".TF::BLUE."]".TF::YELLOW." ");
  public function onEnable() {
    $this->getLogger()->notice(TF::GREEN."Enabled!");
  }
  public function onCommand(CommandSender $sender, Command $command, $list, array $args) {
    if(strtolower($command) === "h" || strtolower($command) === "hunt") {
      $Count = $this->removeEntities();
      $sender->sendMessage($this->Title."Removed ".$Count." entities!");
      return true;
    }
    return false;
  }
  public function removeEntities() {
    $i = 0;
    foreach($this->getServer()->getLevels() as $level) {
      foreach($level->getEntities() as $entity) {
        if(!$entity instanceof Player) {
          $entity->close();
          $entity->kill();
          $entity->despawnFromAll();
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
