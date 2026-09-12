<?php
use CRM_Team_ExtensionUtil as E;

return [
  'name' => 'Team',
  'table' => 'civicrm_team',
  'class' => 'CRM_Team_DAO_Team',
  'getInfo' => fn() => [
    'title' => E::ts('Team'),
    'title_plural' => E::ts('Teams'),
    'description' => E::ts('Basic Team definition'),
    'log' => TRUE,
    'add' => '4.7',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => E::ts('ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => E::ts('Unique Team ID'),
      'add' => '4.7',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'team_name' => [
      'title' => E::ts('Team Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => E::ts('Human-redable team name.'),
      'add' => '4.7',
    ],
    'domain_id' => [
      'title' => E::ts('Domain ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => E::ts('FK to domain table'),
      'add' => '4.7',
      'entity_reference' => [
        'entity' => 'Domain',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'created' => [
      'title' => E::ts('Created on'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'description' => E::ts('Date on which the Team was created'),
      'add' => '4.7',
      'default' => 'CURRENT_TIMESTAMP',
    ],
    'created_id' => [
      'title' => E::ts('Team Created By'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => E::ts('FK to contact table.'),
      'add' => '4.7',
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'is_active' => [
      'title' => E::ts('Enabled'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => E::ts('Is this Team active?'),
      'add' => '4.7',
      'default' => TRUE,
    ],
    'data' => [
      'title' => E::ts('Data'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'description' => E::ts('Serialised JSON of additional configuration.'),
    ],
  ],
];
