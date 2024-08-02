<?php

declare(strict_types=1);

namespace App\Actions\CRM;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class GetCrmQrcode
{
    public function __construct(private readonly GenerateCrmUrl $generateCrmUrl)
    {
    }

    public function execute(): string
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(192, 0, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd
            )
        ))->writeString($this->generateCrmUrl->execute());

        return trim(substr($svg, strpos($svg, "\n") + 1));
    }
}
