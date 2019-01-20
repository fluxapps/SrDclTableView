<?php

namespace srag\Plugins\SrDclTableView\Config;

use ilSrDclTableViewPlugin;
use srag\DIC\SrDclTableView\DICTrait;
use srag\Plugins\SrDclTableView\Utils\SrDclTableViewTrait;

/**
 * Class Configs
 *
 * @package srag\Plugins\SrDclTableView\DclTableView
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Configs {

	use DICTrait;
	use SrDclTableViewTrait;
	const PLUGIN_CLASS_NAME = ilSrDclTableViewPlugin::class;
	const GET_PARAM_REF_ID = "ref_id";
	const GET_PARAM_TARGET = "target";
	/**
	 * @var self
	 */
	protected static $instance = NULL;


	/**
	 * @return self
	 */
	public static function getInstance(): self {
		if (self::$instance === NULL) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * DclTableViews constructor
	 */
	private function __construct() {

	}


	/**
	 * @return int
	 */
	public function filterRefId(): int {
		$ref_id = filter_input(INPUT_GET, self::GET_PARAM_REF_ID);
		if (is_null($ref_id)) {
			$param_target = filter_input(INPUT_GET, self::GET_PARAM_TARGET);
			$ref_id = explode('_', $param_target)[1];
		}

		return intval($ref_id);
	}


	/**
	 * @param int $config_id
	 *
	 * @return Config
	 */
	public function getConfig(int $config_id): Config {
		/**
		 * @var Config $config
		 */

		$config = Config::findOrGetInstance($config_id);

		return $config;
	}
}
