<?php

declare(strict_types=1);

namespace DaPigGuy\PiggyPersonaSkins\skin;

use InvalidArgumentException;
use pocketmine\entity\Skin;
use pocketmine\network\mcpe\protocol\types\SkinData;

class PiggySkin extends Skin
{
    /** @var SkinData */
    public $data;

    public function __construct(SkinData $data)
    {
        $this->data = $data;

        $geometryName = "";
        $resourcePatch = json_decode($data->getResourcePatch(), true);
        if (is_array($resourcePatch["geometry"]) && is_string($resourcePatch["geometry"]["default"])) {
            $geometryName = $resourcePatch["geometry"]["default"];
        }
        parent::__construct($data->getSkinId(), $data->getSkinImage()->getData(), $data->getCapeImage()->getData(), $geometryName, $data->getGeometryData());
    }

    public function validate(): void
    {
        if ($this->getSkinId() === "") {
            throw new InvalidArgumentException("Skin ID must not be empty");
        }
        if ($this->data->getSkinImage()->getWidth() < 64) {
            throw new InvalidArgumentException("Skin Image Width must be 64 or greater");
        }
        if ($this->data->getSkinImage()->getHeight() < 32) {
            throw new InvalidArgumentException("Skin Image Height must be 32 or greater");
        }
        if (strlen($this->data->getSkinImage()->getData()) < 64 * 32 * 4) {
            throw new InvalidArgumentException("Skin Image Data must be 8192 bytes or greater in length");
        }
    }
}
