<?php

/**
 * DAOs provide an OOP-style facade for reading and writing database records.
 *
 * DAOs are a primary source for metadata in older versions of CiviCRM (<5.74)
 * and are required for some subsystems (such as APIv3).
 *
 * This stub provides compatibility. It is not intended to be modified in a
 * substantive way. Property annotations may be added, but are not required.
 * @property string $id
 * @property string $team_name
 * @property string $domain_id
 * @property string $created
 * @property string $created_id
 * @property bool|string $is_active
 * @property string $data
 */
class CRM_Team_DAO_Team extends CRM_Team_DAO_Base {

  /**
   * Required by older versions of CiviCRM (<5.74).
   * @var string
   */
  public static $_tableName = 'civicrm_team';

}
