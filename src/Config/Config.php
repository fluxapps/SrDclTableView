<?php

namespace srag\Plugins\SrDclTableView\Config;

use ActiveRecord;
use arConnector;
use ilSrDclTableViewPlugin;
use srag\DIC\srDclTableView\DICTrait;
use srag\Plugins\SrDclTableView\Utils\SrDclTableViewTrait;

/**
 * Class Config
 *
 * @package srag\Plugins\SrDclTableView\DclTableView
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 * @author  studer + raimann ag - Team Custom 1 <ms@studer-raimann.ch>
 */
class Config extends ActiveRecord {

	use DICTrait;
	use SrDclTableViewTrait;
	const TABLE_NAME = "co_pgcp_srdtv_config";
	const PLUGIN_CLASS_NAME = ilSrDclTableViewPlugin::class;
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 * @con_is_primary   true
	 * @con_sequence     true
	 */
	protected $id = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      8
	 * @con_is_notnull  true
	 */
	protected $dcl_tableview_id = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      8
	 * @con_is_notnull  true
	 */
	protected $dcl_field_id_subprocess_ref = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      8
	 * @con_is_notnull  true
	 */
	protected $dcl_field_id_topic_ref = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      8
	 * @con_is_notnull  true
	 */
	protected $dcl_field_id_topic_title = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      8
	 * @con_is_notnull  true
	 */
	protected $dcl_field_id_topic_order_by = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      8
	 * @con_is_notnull  true
	 */
	protected $dcl_field_id_activity_childs = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      8
	 * @con_is_notnull  true
	 */
	protected $dcl_field_id_activity_title = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      8
	 * @con_is_notnull  true
	 */
	protected $dcl_field_id_start_point = 0;






	/**
	 * DclTableView constructor
	 *
	 * @param int              $primary_key_value
	 * @param arConnector|null $connector
	 */
	public function __construct(/*int*/
		$primary_key_value = 0, arConnector $connector = NULL) {
		parent::__construct($primary_key_value, $connector);
	}


	/**
	 * @return string
	 */
	public function getConnectorContainerName(): string {
		return self::TABLE_NAME;
	}


	/**
	 * @param string $field_name
	 *
	 * @return mixed|null
	 */
	public function sleep(/*string*/
		$field_name) {
		$field_value = $this->{$field_name};

		switch ($field_name) {
			default:
				return NULL;
		}
	}


	/**
	 * @param string $field_name
	 * @param mixed  $field_value
	 *
	 * @return mixed|null
	 */
	public function wakeUp(/*string*/
		$field_name, $field_value) {
		switch ($field_name) {
			case "id":
			case "dcl_tableview_id":
				return intval($field_value);
			default:
				return NULL;
		}
	}


	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}


	/**
	 * @param int $id
	 */
	public function setId(int $id) {
		$this->id = $id;
	}


	/**
	 * @return int
	 */
	public function getDclTableviewId(): int {
		return $this->dcl_tableview_id;
	}


	/**
	 * @param int $dcl_tableview_id
	 */
	public function setDclTableviewId(int $dcl_tableview_id) {
		$this->dcl_tableview_id = $dcl_tableview_id;
	}


	/**
	 * @return int
	 */
	public function getDclFieldIdSubprocessRef(): int {
		return $this->dcl_field_id_subprocess_ref;
	}


	/**
	 * @param int $dcl_field_id_subprocess_ref
	 */
	public function setDclFieldIdSubprocessRef(int $dcl_field_id_subprocess_ref) {
		$this->dcl_field_id_subprocess_ref = $dcl_field_id_subprocess_ref;
	}


	/**
	 * @return int
	 */
	public function getDclFieldIdTopicRef(): int {
		return $this->dcl_field_id_topic_ref;
	}


	/**
	 * @param int $dcl_field_id_topic_ref
	 */
	public function setDclFieldIdTopicRef(int $dcl_field_id_topic_ref) {
		$this->dcl_field_id_topic_ref = $dcl_field_id_topic_ref;
	}


	/**
	 * @return int
	 */
	public function getDclFieldIdTopicTitle(): int {
		return $this->dcl_field_id_topic_title;
	}


	/**
	 * @param int $dcl_field_id_topic_title
	 */
	public function setDclFieldIdTopicTitle(int $dcl_field_id_topic_title) {
		$this->dcl_field_id_topic_title = $dcl_field_id_topic_title;
	}


	/**
	 * @return int
	 */
	public function getDclFieldIdTopicOrderBy(): int {
		return $this->dcl_field_id_topic_order_by;
	}


	/**
	 * @param int $dcl_field_id_topic_order_by
	 */
	public function setDclFieldIdTopicOrderBy(int $dcl_field_id_topic_order_by) {
		$this->dcl_field_id_topic_order_by = $dcl_field_id_topic_order_by;
	}


	/**
	 * @return int
	 */
	public function getDclFieldIdActivityChilds(): int {
		return $this->dcl_field_id_activity_childs;
	}


	/**
	 * @param int $dcl_field_id_activity_childs
	 */
	public function setDclFieldIdActivityChilds(int $dcl_field_id_activity_childs) {
		$this->dcl_field_id_activity_childs = $dcl_field_id_activity_childs;
	}


	/**
	 * @return int
	 */
	public function getDclFieldIdActivityTitle(): int {
		return $this->dcl_field_id_activity_title;
	}


	/**
	 * @param int $dcl_field_id_activity_title
	 */
	public function setDclFieldIdActivityTitle(int $dcl_field_id_activity_title) {
		$this->dcl_field_id_activity_title = $dcl_field_id_activity_title;
	}


	/**
	 * @return int
	 */
	public function getDclFieldIdStartPoint(): int {
		return $this->dcl_field_id_start_point;
	}


	/**
	 * @param int $dcl_field_id_start_point
	 */
	public function setDclFieldIdStartPoint(int $dcl_field_id_start_point) {
		$this->dcl_field_id_start_point = $dcl_field_id_start_point;
	}
}
