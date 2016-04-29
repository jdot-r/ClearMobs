<?php
namespace LostTeam;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\DroppedItem;
use pocketmine\Player;


class ClearMobs extends PluginBase {
  public function onEnable() {
    $this->getLogger()->notice(TF::GREEN."Enabled!");
  }
  public function onCommand(CommandSender $sender, Command $command, $list, array $args) {
    if(strtolower($command) === "clearmobs") {
      //
    }
  }
  public function onDisable() {
    $this->getLogger()->notice(YF::GREEN."Disabled!");
  }
}
