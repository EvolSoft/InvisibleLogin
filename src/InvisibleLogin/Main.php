<?php

/*
 * InvisibleLogin (v1.1) by EvolSoft
 * Developer: EvolSoft (Flavius12)
 * Website: http://www.evolsoft.tk
 * Date: 11/03/2017 12:51 AM (UTC)
 * Copyright & License: (C) 2016-2017 EvolSoft
 * Licensed under MIT (https://github.com/EvolSoft/InvisibleLogin/blob/master/LICENSE)
 */

namespace InvisibleLogin;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

use ServerAuth\ServerAuth;

class Main extends PluginBase {
	
	//About Plugin Const
	
	/** @var string PRODUCER Plugin producer */
	const PRODUCER = "EvolSoft";
	
	/** @var string VERSION Plugin version */
	const VERSION = "1.1";
	
	/** @var string MAIN_WEBSITE Plugin producer website */
	const MAIN_WEBSITE = "http://www.evolsoft.tk";
	
	//Other Const
	
	/** @var string PREFIX Plugin prefix */
	const PREFIX = "&b[InvisibleLogin] ";
	
	/**
	 * Translate Minecraft colors
	 *
	 * @param char $symbol Color symbol
	 * @param string $message The message to be translated
	 *
	 * @return string The translated message
	 */
	public function translateColors($symbol, $message){		
		return str_replace($symbol, TextFormat::ESCAPE, $message);
	}
	
    public function onEnable(){
        $this->logger = Server::getInstance()->getLogger();
        if($this->getServer()->getPluginManager()->getPlugin("ServerAuth")){
    		if(ServerAuth::getAPI()->getAPIVersion() == "1.1.1"){
    			$this->logger->info($this->translateColors("&", Main::PREFIX . "&aInvisibleLogin &cv" . Main::VERSION . " &adeveloped by&c " . Main::PRODUCER));
        		$this->logger->info($this->translateColors("&", Main::PREFIX . "&aWebsite &c" . Main::MAIN_WEBSITE));
        		$this->getServer()->getScheduler()->scheduleRepeatingTask(new PlayerTask($this), 20);
    		}else{
    			$this->logger->error($this->translateColors("&", Main::PREFIX . "&cPlease use ServerAuth (API 1.1.1). Plugin Disabled!"));
    		}
        }else{
        	$this->logger->error($this->translateColors("&", Main::PREFIX . "&cPlease install ServerAuth (API 1.1.1). Plugin Disabled!"));
        }
    }
}
