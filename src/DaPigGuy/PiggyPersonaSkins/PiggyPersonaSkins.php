<?php

declare(strict_types=1);

namespace DaPigGuy\PiggyPersonaSkins;

use DaPigGuy\PiggyPersonaSkins\skin\PiggySkinAdaptor;
use pocketmine\network\mcpe\protocol\types\SkinAdapterSingleton;
use pocketmine\plugin\PluginBase;

class PiggyPersonaSkins extends PluginBase
{
    public function onEnable(): void
    {
        SkinAdapterSingleton::set(new PiggySkinAdaptor());
    }
}