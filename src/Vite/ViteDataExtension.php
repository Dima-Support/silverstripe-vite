<?php

namespace ViteHelper\Vite;

use SilverStripe\Core\Extension;

class ViteDataExtension extends Extension
{
    public function getVite() : ViteHelper
    {
        return ViteHelper::create();
    }
}
