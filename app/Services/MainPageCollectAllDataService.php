<?php

namespace App\Services;

use App\Models\Games;
use App\Models\Separator;
use App\Models\Settings;
use Jenssegers\Agent\Agent;

class MainPageCollectAllDataService
{

    /**
     * @var Games
     */
    private $games;
    /**
     * @var Separator
     */
    private $separator;
    /**
     * @var Settings
     */
    private $settings;
    /**
     * @var Agent
     */
    private $agent;

    public function __construct(Games $games, Separator $separator, Settings $settings,Agent $agent)
    {

        $this->games = $games;
        $this->separator = $separator;
        $this->settings = $settings;
        $this->agent = $agent;
    }


    public function setAllDataMainPage($request): array
    {
        return [
            'data_for_big' => $this->games->where('published', 'yes')
                  ->where('slider', 'big')->where("platform", $this->setPlatformVersion($request->platform_version))
                  ->where("version", $this->setPayVersion($request->payment_version))
                  ->orderBy('slot', 'ASC')
                  ->get(),
            'data_for_small' => $this->games->where('published', 'yes')
                ->where('slider', 'small')->where("platform", $this->setPlatformVersion($request->platform_version))
                ->where("version", $this->setPayVersion($request->payment_version))
                ->orderBy('slot', 'ASC')
                ->get(),
            'data_for_separator' => $this->separator->find(1),
            'version' => $this->agent->isTablet(),
            'speed_for_big' => $this->settings->where('name', 'big')->first()->speed,
            'speed_for_small' => $this->settings->where('name', 'small')->first()->speed
        ];
    }

    public function setPayVersion($payment_version): string
    {
        return ($payment_version == 'freemium') ? 'premium' : 'free';
    }

    public function setPlatformVersion($platform_version): string
    {
        return ($platform_version == 'freemium') ? 'amazone' : $platform_version;
    }
}
