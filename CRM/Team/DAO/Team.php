<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2017                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2017
 *
 * Generated from xml/schema/CRM/Team/Team.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:d72f145c1cd237f00f0243bbf6677203)
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
/**
 * CRM_Team_DAO_Team constructor.
 */
class CRM_Team_DAO_Team extends CRM_Core_DAO {
  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  static $_tableName = 'civicrm_team';
  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Unique Team ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * Human-redable team name.
   *
   * @var string
   */
  public $team_name;
  /**
   * FK to domain table
   *
   * @var int unsigned
   */
  public $domain_id;
  /**
   * Date on which the Team was created
   *
   * @var timestamp
   */
  public $created;
  /**
   * FK to contact table.
   *
   * @var int unsigned
   */
  public $created_id;
  /**
   * Is this Team active?
   *
   * @var boolean
   */
  public $is_active;
  /**
   * Serialised JSON of additional configuration.
   *
   * @var text
   */
  public $data;
  /**
   * Class constructor.
   */
  function __construct() {
    $this->__table = 'civicrm_team';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static ::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName() , 'domain_id', 'civicrm_domain', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName() , 'created_id', 'civicrm_contact', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => 'Unique Team ID',
          'required' => true,
          'table_name' => 'civicrm_team',
          'entity' => 'Team',
          'bao' => 'CRM_Team_DAO_Team',
          'localizable' => 0,
        ) ,
        'team_name' => array(
          'name' => 'team_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Team Name') ,
          'description' => 'Human-redable team name.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_team',
          'entity' => 'Team',
          'bao' => 'CRM_Team_DAO_Team',
          'localizable' => 0,
        ) ,
        'domain_id' => array(
          'name' => 'domain_id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => 'FK to domain table',
          'required' => false,
          'table_name' => 'civicrm_team',
          'entity' => 'Team',
          'bao' => 'CRM_Team_DAO_Team',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_Domain',
        ) ,
        'created' => array(
          'name' => 'created',
          'type' => CRM_Utils_Type::T_TIMESTAMP,
          'title' => ts('Created on') ,
          'description' => 'Date on which the Team was created',
          'required' => false,
          'table_name' => 'civicrm_team',
          'entity' => 'Team',
          'bao' => 'CRM_Team_DAO_Team',
          'localizable' => 0,
        ) ,
        'created_id' => array(
          'name' => 'created_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Team Created By') ,
          'description' => 'FK to contact table.',
          'table_name' => 'civicrm_team',
          'entity' => 'Team',
          'bao' => 'CRM_Team_DAO_Team',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'is_active' => array(
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Enabled') ,
          'description' => 'Is this Team active?',
          'table_name' => 'civicrm_team',
          'entity' => 'Team',
          'bao' => 'CRM_Team_DAO_Team',
          'localizable' => 0,
        ) ,
        'data' => array(
          'name' => 'data',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Data') ,
          'description' => 'Serialised JSON of additional configuration.',
          'required' => false,
          'table_name' => 'civicrm_team',
          'entity' => 'Team',
          'bao' => 'CRM_Team_DAO_Team',
          'localizable' => 0,
        ) ,
      );
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }
  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName() {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog() {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'team', $prefix, array());
    return $r;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'team', $prefix, array());
    return $r;
  }
  /**
   * Returns the list of indices
   */
  public static function indices($localize = TRUE) {
    $indices = array();
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }
}
