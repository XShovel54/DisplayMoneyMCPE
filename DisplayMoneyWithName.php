<?php

namespace DisplayMoneyWithName;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use PocketMoney\event\MoneyUpdateEvent;

class DisplayMoneyWithName extends PluginBase implements Listener
{

    public function onLoad()
    {
    }

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDisable()
    {
    }

    public function onPlayerJoin(PlayerJoinEvent $event)
    {
        $p = $event->getPlayer();
        $tag = "[" . $this->getServer()->getPluginManager()->getPlugin("PocketMoney")->getMoney($p->getName()) . " PM] " . $p->getName();
        $p->setNameTag($tag);
    }

    public function onMoneyUpdate(MoneyUpdateEvent $event)
    {
        $tag = "[" . $event->getAmount() . " PM] " . $event->getPlayer();
        $event->getPlayer()->setNameTag($tag);
    }
}
