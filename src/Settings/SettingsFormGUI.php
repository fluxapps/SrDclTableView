<?php

namespace srag\Plugins\SrDclTableView\Settings;

use ilSelectInputGUI;
use ilSrDclTableViewPlugin;
use ilSrDclTableViewPluginGUI;
use srag\CustomInputGUIs\SrDclTableView\PropertyFormGUI\ObjectPropertyFormGUI;
use srag\Plugins\SrDclTableView\Config\Config;
use srag\Plugins\SrDclTableView\Utils\SrDclTableViewTrait;

/**
 * Class SettingsFormGUI
 *
 * @package srag\Plugins\SrDclTableView\Settings
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 * @author  studer + raimann ag - Team Custom 1 <ms@studer-raimann.ch>
 */
class SettingsFormGUI extends ObjectPropertyFormGUI {

	use SrDclTableViewTrait;
	const PLUGIN_CLASS_NAME = ilSrDclTableViewPlugin::class;
	const LANG_MODULE = ilSrDclTableViewPluginGUI::LANG_MODULE_DCL_TABLE_VIEW;


	/**
	 * SettingsFormGUI constructor
	 *
	 * @param ilSrDclTableViewPluginGUI $parent
	 * @param Config                    $config
	 */
	public function __construct(ilSrDclTableViewPluginGUI $parent, Config $config) {
		parent::__construct($parent, $config);
	}


	/**
	 * @inheritdoc
	 */
	protected function initCommands()/*: void*/ {
		if ($this->object->getGraphId() > 0) {
			$this->addCommandButton(ilSrDclTableViewPluginGUI::CMD_UPDATE, $this->txt("save"));
		} else {
			$this->addCommandButton(ilSrDclTableViewPluginGUI::CMD_CREATE, $this->txt("save"));
		}

		$this->addCommandButton(ilSrDclTableViewPluginGUI::CMD_CANCEL, $this->txt("cancel"));

		$this->setShowTopButtons(false);
	}


	/**
	 * @inheritdoc
	 */
	protected function initFields()/*: void*/ {
		$this->fields = [
			"dcl_field_id_subprocess_ref" => [
				self::PROPERTY_CLASS => ilSelectInputGUI::class,
				self::PROPERTY_REQUIRED => false,
				self::PROPERTY_OPTIONS => self::ilias()->dataCollections()->getAllFields(self::Configs()->filterRefId(),true)
			],
			"dcl_field_id_topic_ref" => [
				self::PROPERTY_CLASS => ilSelectInputGUI::class,
				self::PROPERTY_REQUIRED => false,
				self::PROPERTY_OPTIONS => self::ilias()->dataCollections()->getAllFields(self::Configs()->filterRefId(),true)
			],
			"dcl_field_id_topic_title" => [
				self::PROPERTY_CLASS => ilSelectInputGUI::class,
				self::PROPERTY_REQUIRED => false,
				self::PROPERTY_OPTIONS => self::ilias()->dataCollections()->getAllFields(self::Configs()->filterRefId(),false)
			],
			"dcl_field_id_topic_order_by" => [
				self::PROPERTY_CLASS => ilSelectInputGUI::class,
				self::PROPERTY_REQUIRED => false,
				self::PROPERTY_OPTIONS => self::ilias()->dataCollections()->getAllFields(self::Configs()->filterRefId(),false)
			],
			"dcl_field_id_start_point" => [
				self::PROPERTY_CLASS => ilSelectInputGUI::class,
				self::PROPERTY_REQUIRED => false,
				self::PROPERTY_OPTIONS => self::ilias()->dataCollections()->getAllFields(self::Configs()->filterRefId(),false)
			],
			"dcl_field_id_activity_childs" => [
				self::PROPERTY_CLASS => ilSelectInputGUI::class,
				self::PROPERTY_REQUIRED => false,
				self::PROPERTY_OPTIONS => self::ilias()->dataCollections()->getAllFields(self::Configs()->filterRefId(),true)
			],
			"dcl_field_id_activity_title" => [
				self::PROPERTY_CLASS => ilSelectInputGUI::class,
				self::PROPERTY_REQUIRED => false,
				self::PROPERTY_OPTIONS => self::ilias()->dataCollections()->getAllFields(self::Configs()->filterRefId(),false)
			],
			"dcl_table_view_id" => [
				self::PROPERTY_CLASS => ilSelectInputGUI::class,
				self::PROPERTY_REQUIRED => false,
				self::PROPERTY_OPTIONS => self::ilias()->dataCollections()->getAllTableViews(self::configs()->filterRefId())
			]
		];
	}





	/**
	 * @inheritdoc
	 */
	protected function initId()/*: void*/ {
		$this->setId("srdtv_form");
	}


	/**
	 * @inheritdoc
	 */
	protected function initTitle()/*: void*/ {
		$this->setTitle(ilSrDclTableViewPlugin::PLUGIN_NAME);
	}
}
