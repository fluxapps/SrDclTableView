<?php

namespace srag\Plugins\SrDclTableView\Access;

use ilDclReferenceFieldRepresentation;
use ilDclDatatype;
use ilObjDataCollection;
use ilSrDclTableViewPlugin;
use srag\DIC\SrDclTableView\DICTrait;
use srag\Plugins\SrDclTableView\Utils\SrDclTableViewTrait;

/**
 * Class DataCollections
 *
 * @package srag\Plugins\SrDclTableView\Access
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class DataCollections {

	use DICTrait;
	use SrDclTableViewTrait;
	const PLUGIN_CLASS_NAME = ilSrDclTableViewPlugin::class;
	const SEPARATOR = " -> ";
	const GET_PARAM_RECORD_ID = "record_id";

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
	 * DataCollections constructor
	 */
	private function __construct() {

	}


	/**
	 * @param int  $ref_id
	 * @param bool $only_references
	 *
	 * @return array
	 */
	public function getAllTableViews(int $ref_id): array {
		$dcl = new ilObjDataCollection($ref_id);

		$table_views = [];

		foreach ($dcl->getTables() as $table) {
			foreach ($table->getTableViews() as $view) {
				$table_views[$view->getId()] = $table->getTitle() . self::SEPARATOR . $view->getTitle();
			}
		}

		return $table_views;
	}

	/**
	 * @param int  $ref_id
	 * @param bool $only_references
	 *
	 * @return array
	 */
	public function getAllFields(int $ref_id, bool $only_references = true): array {
		$dcl = new ilObjDataCollection($ref_id);

		$fields = [];

		foreach ($dcl->getTables() as $table) {
			foreach ($table->getRecordFields() as $field) {
				if (!$only_references || intval($field->getDatatypeId()) === ilDclDatatype::INPUTFORMAT_REFERENCE) {
					$fields[$field->getId()] = $table->getTitle() . ilDclReferenceFieldRepresentation::REFERENCE_SEPARATOR . $field->getTitle();
				}
			}
		}

		return $fields;
	}


	/**
	 * @return int
	 */
	public function filterRecordId(): int {
		$ref_id = filter_input(INPUT_GET, self::GET_PARAM_RECORD_ID);
		if (is_null($ref_id)) {
			$param_target = filter_input(INPUT_GET, self::GET_PARAM_RECORD_ID);
			$ref_id = explode('_', $param_target)[1];
		}

		return intval($ref_id);
	}
}
