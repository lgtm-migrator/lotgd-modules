<?php

use Tracy\Debugger;
// translator ready
// addnews ready
// mail ready

/* Ghost Town - Halloween */
/* ver 1.0 8th Sept 2004 */
/* Shannon Brown => SaucyWench -at- gmail -dot- com */

function ghosttown_getmoduleinfo()
{
    return [
        'name'     => 'Ghost Town',
        'version'  => '3.0.0',
        'author'   => 'Shannon Brown, refactoring by `%IDMarinas`0, <a href="//draconia.infommo.es">draconia.infommo.es</a>',
        'category' => 'Village',
        'download' => 'core_module',
        'settings' => [
            'Ghost Town Settings,title',
            'villagename' => 'Name for the ghost town|Esoterra',
            'defacedname' => 'Defaced name for the ghost town|Eso`^Terron`0',
            'allowtravel' => "Allow 'standard' travel to town?,bool|0",
        ],
        'prefs' => [
            'Ghost Town User Preferences,title',
            'allow' => 'Is player allowed in?,bool|0',
        ],
        'requires' => [
            'lotgd' => '>=5.5.0|Need a version equal or greater than 5.5.0 IDMarinas Edition',
        ],
    ];
}

function ghosttown_install()
{
    module_addhook('village-text-domain');
    module_addhook('page-village-tpl-params');
    module_addhook('travel');
    module_addhook('validlocation');
    module_addhook('moderate-comment-sections');
    module_addhook('changesetting');
    module_addhook('pvpwin');
    module_addhook('pvploss');

    return true;
}

function ghosttown_uninstall()
{
    global $session;

    $vname = LotgdSetting::getSetting('villagename', LOCATION_FIELDS);
    $gname = get_module_setting('villagename');

    try
    {
        $charactersRepository = Doctrine::getRepository('LotgdCore:Avatar');

        //-- Updated location
        $query = $charactersRepository->getQueryBuilder();
        $query->update('LotgdCore:Avatar', 'u')
            ->set('u.location', ':new')
            ->where('u.location = :old')

            ->setParameter('old', $gname)
            ->setParameter('new', $vname)

            ->getQuery()
            ->execute()
        ;

        if ($session['user']['location'] == $gname)
        {
            $session['user']['location'] = $vname;
        }
    }
    catch (Throwable $th)
    {
        Debugger::log($th);

        return false;
    }
}

function ghosttown_dohook($hookname, $args)
{
    global $session, $resline;

    $city = get_module_setting('villagename');

    switch ($hookname)
    {
        case 'pvpwin':
            if ($session['user']['location'] == $city)
            {
                $args['handled'] = true;

                LotgdLog::addNews('news.pvp.win', [
                    'playerName'   => $session['user']['name'],
                    'creatureName' => $args['badguy']['creaturename'],
                    'location'     => $args['badguy']['location'],
                ], 'ghosttown_module');
            }
        break;
        case 'pvploss':
            if ($session['user']['location'] == $city)
            {
                require_once 'lib/taunt.php';

                $args['handled'] = true;

                LotgdLog::addNews('deathmessage', [
                    'deathmessage' => [
                        'deathmessage' => 'news.pvp.defeated',
                        'params'       => [
                            'playerName'   => $session['user']['name'],
                            'creatureName' => $args['badguy']['creaturename'],
                            'location'     => $args['badguy']['location'],
                        ],
                        'textDomain' => 'ghosttown_module',
                    ],
                    'taunt' => LotgdTool::selectTaunt(),
                ], '');
            }
        break;
        case 'travel':
            $allow  = get_module_pref('allow') || get_module_setting('allowtravel');
            $hotkey = \substr($city, 0, 1);
            $ccity  = \urlencode($city);

            //-- Change text domain for navigation
            LotgdNavigation::setTextDomain('cities-navigation');

            // Esoterra is always dangerous travel.
            if ($session['user']['location'] != $city && $allow)
            {
                LotgdNavigation::addHeader('headers.travel.dangerous');
                LotgdNavigation::addNav('navs.go', "runmodule.php?module=cities&op=travel&city={$ccity}&d=1", [
                    'params' => ['key' => $hotkey, 'city' => $city],
                ]);
            }

            if ($session['user']['superuser'] & SU_EDIT_USERS && $allow)
            {
                LotgdNavigation::addHeader('headers.superuser');
                LotgdNavigation::addNav('navs.go', "runmodule.php?module=cities&op=travel&city={$ccity}&su=1", [
                    'params' => ['key' => $hotkey, 'city' => $city],
                ]);
            }

            //-- Restore text domain for navigation
            LotgdNavigation::setTextDomain();
        break;
        case 'changesetting':
            // Ignore anything other than villagename setting changes
            if ('villagename' == $args['setting'] && 'ghosttown' == $args['module'])
            {
                if ($session['user']['location'] == $args['old'])
                {
                    $session['user']['location'] = $args['new'];
                }

                $charactersRepository = Doctrine::getRepository('LotgdCore:Avatar');

                $query = $charactersRepository->getQueryBuilder();
                $query->update('LotgdCore:Avatar', 'u')
                    ->set('u.location', ':new')
                    ->where('u.location = :old')

                    ->setParameter('old', $args['old'])
                    ->setParameter('new', $args['new'])

                    ->getQuery()
                    ->execute()
                ;
            }
        break;
        case 'validlocation':
            $canvisit = 0;

            if (is_module_active('caravan') && get_module_setting('canvisit', 'caravan'))
            {
                $canvisit = 1;
            }

            if (get_module_pref('allow') || get_module_setting('allowtravel'))
            {
                $canvisit = 1;
            }

            if ( ! $canvisit && ( ! isset($args['all']) || ! $args['all']))
            {
                break;
            }

            if (is_module_active('cities'))
            {
                $args[$city] = 'village-ghosttown';
            }
        break;
        case 'moderate-comment-sections':
            if (is_module_active('cities'))
            {
                $args['village-ghosttown'] = LotgdTranslator::t('moderate', ['city' => $city], 'ghosttown_module');
            }
        break;
        case 'village-text-domain':
            if ($session['user']['location'] == $city)
            {
                $args['textDomain']           = 'ghosttown_village';
                $args['textDomainNavigation'] = 'ghosttown_village_navigation';

                LotgdNavigation::blockHideLink('lodge.php');
                LotgdNavigation::blockHideLink('weapons.php');
                LotgdNavigation::blockHideLink('armor.php');
                LotgdNavigation::blockHideLink('clan.php');
                LotgdNavigation::blockHideLink('pvp.php');
                LotgdNavigation::blockHideLink('forest.php');
                LotgdNavigation::blockHideLink('gardens.php');
                LotgdNavigation::blockHideLink('gypsy.php');
                LotgdNavigation::blockHideLink('bank.php');

                $allow = get_module_pref('allow') || get_module_setting('allowtravel');

                if ( ! $allow)
                {
                    blockmodule('cities');
                }

                blockmodule('tynan');
                blockmodule('abigail');
                blockmodule('crazyaudrey');
                blockmodule('icecaravan');
            }
        break;
        case 'page-village-tpl-params':
            if ($session['user']['location'] == $city)
            {
                $args['village']           = $city;
                $args['commentarySection'] = 'village-ghosttown'; //-- Commentary section
                $args['defaced']           = get_module_setting('defacedname');

                //-- Newest player in realm
                $args['newestplayer'] = 0;
                $args['newestname']   = '';

                LotgdNavigation::addHeader('headers.gate');
                LotgdNavigation::addNav('navs.pvp', 'pvp.php?campsite=1');
            }
        break;
    }

    return $args;
}

function ghosttown_run()
{
}
