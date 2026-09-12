<?php
use CRM_Team_ExtensionUtil as E;

return [
  'name' => 'TeamContact',
  'table' => 'civicrm_team_contact',
  'class' => 'CRM_Team_DAO_TeamContact',
  'getInfo' => fn() => [
    'title' => E::ts('Team Contact'),
    'title_plural' => E::ts('Team Contacts'),
    'description' => E::ts('Contact Membership in a Team'),
    'log' => TRUE,
    'add' => '4.7',
  ],
  'getIndices' => fn() => [
    'UI_team_contact_id' => [
      'fields' => [
        'team_id' => TRUE,
        'contact_id' => TRUE,
      ],
      'unique' => TRUE,
      'add' => '4.7',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => E::ts('ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => E::ts('Unique TeamContact ID'),
      'add' => '4.7',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'team_id' => [
      'title' => E::ts('Team ID'),
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
    'contact_id' => [
      'title' => E::ts('Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => E::ts('FK to Contact'),
      'add' => '4.7',
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'date_added' => [
      'title' => E::ts('Date Added'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'description' => E::ts('Date on which the Contact was added to the team'),
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
    'status' => [
      'title' => E::ts('Status'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => E::ts('Indicates if the contact is currently participating in the Team.'),
      'add' => '4.7',
    ],
  ],
];
