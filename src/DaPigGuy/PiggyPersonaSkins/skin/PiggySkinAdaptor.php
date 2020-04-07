<?php

declare(strict_types=1);

namespace DaPigGuy\PiggyPersonaSkins\skin;

use pocketmine\entity\Skin;
use pocketmine\network\mcpe\protocol\types\LegacySkinAdapter;
use pocketmine\network\mcpe\protocol\types\SkinAdapter;
use pocketmine\network\mcpe\protocol\types\SkinData;

class PiggySkinAdaptor implements SkinAdapter
{
    /** @var LegacySkinAdapter */
    private $legacyAdaptor;

    public function __construct()
    {
        $this->legacyAdaptor = new LegacySkinAdapter();
    }

    public function toSkinData(Skin $skin): SkinData
    {
        if (!$skin instanceof PiggySkin) return $this->legacyAdaptor->toSkinData($skin);
        return $skin->data;
    }

    public function fromSkinData(SkinData $data): Skin
    {
        return new PiggySkin($data);
    }
}