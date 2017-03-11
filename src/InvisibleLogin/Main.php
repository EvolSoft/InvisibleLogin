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
		
		$message = str_replace($symbol."0", TextFormat::BLACK, $message);
		$message = str_replace($symbol."1", TextFormat::DARK_BLUE, $message);
		$message = str_replace($symbol."2", TextFormat::DARK_GREEN, $message);
		$message = str_replace($symbol."3", TextFormat::DARK_AQUA, $message);
		$message = str_replace($symbol."4", TextFormat::DARK_RED, $message);
		$message = str_replace($symbol."5", TextFormat::DARK_PURPLE, $message);
		$message = str_replace($symbol."6", TextFormat::GOLD, $message);
		$message = str_replace($symbol."7", TextFormat::GRAY, $message);
		$message = str_replace($symbol."8", TextFormat::DARK_GRAY, $message);
		$message = str_replace($symbol."9", TextFormat::BLUE, $message);
		$message = str_replace($symbol."a", TextFormat::GREEN, $message);
		$message = str_replace($symbol."b", TextFormat::AQUA, $message);
		$message = str_replace($symbol."c", TextFormat::RED, $message);
		$message = str_replace($symbol."d", TextFormat::LIGHT_PURPLE, $message);
		$message = str_replace($symbol."e", TextFormat::YELLOW, $message);
		$message = str_replace($symbol."f", TextFormat::WHITE, $message);
		
		$message = str_replace($symbol."k", TextFormat::OBFUSCATED, $message);
		$message = str_replace($symbol."l", TextFormat::BOLD, $message);
		$message = str_replace($symbol."m", TextFormat::STRIKETHROUGH, $message);
		$message = str_replace($symbol."n", TextFormat::UNDERLINE, $message);
		$message = str_replace($symbol."o", TextFormat::ITALIC, $message);
		$message = str_replace($symbol."r", TextFormat::RESET, $message);
		
		return $message;
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
