<?php

/*
 * InvisibleLogin (v1.1) by EvolSoft
 * Developer: EvolSoft (Flavius12)
 * Website: http://www.evolsoft.tk
 * Date: 11/03/2017 12:52 AM (UTC)
 * Copyright & License: (C) 2016-2017 EvolSoft
 * Licensed under MIT (https://github.com/EvolSoft/InvisibleLogin/blob/master/LICENSE)
 */

namespace InvisibleLogin;

use pocketmine\scheduler\PluginTask;

use ServerAuth\ServerAuth;

class PlayerTask extends PluginTask {
	
    public function __construct(Main $plugin){
    	parent::__construct($plugin);
        $this->plugin = $plugin;
        $this->plugin = $this->getOwner();
        $this->players = array();
    }
    
    public function onRun($tick){
    	foreach($this->plugin->getServer()->getOnlinePlayers() as $player){
    		foreach($this->plugin->getServer()->getOnlinePlayers() as $players){
    			if(!ServerAuth::getAPI()->isPlayerAuthenticated($player)){
    				$players->hidePlayer($player);
    			}else{
    				$players->showPlayer($player);
    			}
    		}
    	}
    }
}
