<?php

namespace Lotgd\Local\Twig\Extension\Pattern\ModuleWorldmapen;

use Twig\Environment;

trait MapEditor
{
    /**
     * Show map for edit.
     */
    public function showMapEditor(Environment $env): string
    {
        $vloc         = [];
        $vname        = getsetting('villagename', LOCATION_FIELDS);
        $vloc[$vname] = 'village';
        $vloc         = modulehook('validlocation', $vloc);

        $cityMap = [];

        foreach ($vloc as $city => $val)
        {
            $cityX = get_module_setting($city.'X', 'worldmapen');
            $cityY = get_module_setting($city.'Y', 'worldmapen');

            $cityMap["{$cityX},{$cityY}"] = $city;
        }

        $params = [
            'textDomain'   => 'module_worldmapen',
            'colorUserLoc' => get_module_setting('colorUserLoc', 'worldmapen'),
            'sizeX'        => get_module_setting('worldmapsizeX', 'worldmapen'),
            'sizeY'        => get_module_setting('worldmapsizeY', 'worldmapen'),
            'cityMap'      => $cityMap,
            'worldMap'     => worldmapen_loadMap(),
            'terrainColor' => worldmapen_getColorDefinitions(),
        ];

        return $env->render('@module/worldmapen/twig/map-editor.twig', $params);
    }
}
