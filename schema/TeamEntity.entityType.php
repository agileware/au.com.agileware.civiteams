<?php
use CRM_Team_ExtensionUtil as E;

return [
  'name' => 'TeamEntity',
  'table' => 'civicrm_team_entity',
  'class' => 'CRM_Team_DAO_TeamEntity',
  'getInfo' => fn() => [
    'title' => E::ts('Team Entity'),
    'title_plural' => E::ts('Team Entities'),
    'description' => E::ts('Entity Relationship with a Team'),
    'log' => TRUE,
    'add' => '4.7',
  ],
  'getIndices' => fn() => [
    'UI_team_entity_id' => [
      'fields' => [
        'team_id' => TRUE,
        'entity_id' => TRUE,
        'entity_table' => TRUE,
      ],
      'unique' => TRUE,
      'add' => '4.7',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => E::ts('Id'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => E::ts('Unique TeamEntity ID'),
      'add' => '4.7',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'team_id' => [
      'title' => E::ts('Team Id'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => E::ts('FK to civicrm_team'),
      'add' => '4.7',
      'pseudoconstant' => [
        'table' => 'civicrm_team',
        'key_column' => 'id',
        'label_column' => 'team_name',
      ],
      'entity_reference' => [
        'entity' => 'Team',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'entity_id' => [
      'title' => E::ts('Entity Id'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => E::ts('FK to Entity'),
      'add' => '4.7',
    ],
    'entity_table' => [
      'title' => E::ts('Entity table'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => E::ts('Entity table'),
      'add' => '4.7',
    ],
    'date_added' => [
      'title' => E::ts('Date Added'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'description' => E::ts('Date on which the Entity was added to the team'),
      'add' => '4.7',
      'default' => 'CURRENT_TIMESTAMP',
    ],
    'date_modified' => [
      'title' => E::ts('Date Modified'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'description' => E::ts('Date on which record is updated'),
      'add' => '4.7',
      'default' => 'CURRENT_TIMESTAMP',
    ],
    'isactive' => [
      'title' => E::ts('IsActive'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => E::ts('Indicates if the entity is currently attached with the Team.'),
      'add' => '4.7',
    ],
  ],
];
