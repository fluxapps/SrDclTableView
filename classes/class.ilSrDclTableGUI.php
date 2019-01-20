<?php


use srag\DIC\SrDclTableView\DICTrait;
use srag\Plugins\SrDclTableView\Utils\SrDclTableViewTrait;

/**
 * Class ilSrDclTableViewGUI
 *
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 *
 */
class ilSrDclTableGUI {
	use DICTrait;
	use SrDclTableViewTrait;
	const PLUGIN_CLASS_NAME = ilSrDclTableViewPlugin::class;
	const LANG_MODULE_DCL_TABLE_VIEW = "srdtv";
	const GET_PARAM_CONFIG_ID = "config_id";

	/***
	 * ilSrDclTableGUI constructor.
	 *
	 * @param $tableview
	 * @param ilDclBaseRecordModel[] $records
	 */
	public function __construct($tableview,  $records){

		$record_data = [];
		foreach ($tableview->getVisibleFields() as $field) {

			foreach($records as $record) {
				$title = $field->getTitle();
				$record_data[$title] = $record->getRecordFieldPlainText($field->getId());
			}

		}

		$this->tpl = self::plugin()->template("table.html");






	}

	public function getTpl() {
		return $this->tpl;
	}

}

?>