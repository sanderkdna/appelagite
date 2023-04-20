<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
            ],
            'Temas' => [
                'icon' => 'inbox',
                'route_name' => 'topics.topic.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Temas'
            ],
            'Historial' => [
                'icon' => 'inbox',
                'route_name' => 'messages.message.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Historial'
            ],
            'Configuraciones' => [
                'icon' => 'inbox',
                'route_name' => 'settings.setting.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Configuraciones'
            ],

        ];
    }
}
