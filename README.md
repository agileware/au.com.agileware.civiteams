# CiviTeams (au.com.agileware.civiteams)

This is a [CiviCRM](https://civicrm.org) extension that adds a generic **Team** entity to
CiviCRM: a named group of Contacts (and, more generally, of any CiviCRM entity) that other
extensions can use as the basis for their own access-control logic. Provides:

* A `Team` entity — a named, enable/disable-able team, optionally restricted to the current
  CiviCRM domain (for multisite installs), with a free-form JSON `data` field that
  plugin extensions can use to store their own per-team configuration.
* A `TeamContact` entity — tracks which Contacts are current or former members of a Team.
* A `TeamEntity` entity — a generic link between a Team and any other CiviCRM entity (by
  entity table and ID), for teams that need to be associated with records other than Contacts.
* A **Teams** listing and management screen, added to the Contacts menu.
* Search Actions to add/remove selected contacts to/from a Team from any Contact search.
* A custom Contact Search ("Team Contacts") listing the members of a given Team.
* Two new CiviCRM permissions to control who can view or administer Teams.
* A `Team.Checkpermissions` API action and a `hook_civicrm_team_permissions` hook that other
  ("plugin") extensions implement to grant or restrict access to their own entities based on
  Team membership.

**Important:** on its own, CiviTeams only provides the data model, UI, and hook for defining
Teams and their members — it does not enforce any access control by itself. A companion
"plugin" extension that implements `hook_civicrm_team_permissions` is required for Teams to
have any practical effect on what users can see or do. See
[Extending CiviTeams](#extending-civiteams) below.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Usage

### Managing Teams

Once installed, a **Manage Teams** item is added under the CiviCRM **Contacts** menu
(`civicrm/teams`), guarded by the **CiviTeams: Access Team Listing** (`access civiteams`) or
**CiviTeams: Administer Teams** (`administer civiteams`) permission. This screen lists all
Teams visible to the current user, with a member count for each, and can be searched by team
name, member name/email, and enabled/disabled status.

An **Add Team** menu item (`civicrm/teams/settings?action=add`, requiring `administer
civiteams`) opens the Team Settings form, where a Team's name and enabled status are set, and
— on multisite installs — whether the Team is available on any domain or restricted to the
domain it was created on.

From the Teams listing, each row provides:

* **Contacts** — opens the "Team Contacts" custom Contact Search, pre-filtered to that
  Team's current members.
* **Settings** — re-opens the Team Settings form to edit the Team.

### Adding and removing Contacts

Two Search Actions are added to the standard CiviCRM Contact Search "Actions" menu:

* **Team - add contacts** — adds the selected contacts to a chosen Team. If a contact was
  previously a member and had been removed, they are re-activated rather than duplicated.
* **Team - remove contacts** — deactivates the selected contacts' membership in a chosen
  Team (their `TeamContact` record is kept, with status set to inactive, rather than deleted).

### Access restrictions

* Team.get results (and the Teams listing) are filtered so that users without `administer
  civiteams` only see Teams they are themselves a member of.
* On multisite installs, only Teams belonging to the contact's current domain (or with no
  domain restriction) are visible.
* The `Team` API's `get` action itself additionally requires `access civiteams` or
  `administer civiteams`.

### API

The extension exposes the following APIv3 entities/actions:

* `Team` — `get`, `create`, `delete`.
* `TeamContact` — `get`, `create`, `delete`.
* `TeamEntity` — `get`, `create`, `delete` (links a Team to an arbitrary entity by
  `entity_table`/`entity_id`).
* `Team.Checkpermissions` — given an `entity_table`, `entity_id`, `action` (e.g. `view`,
  `edit`, `delete`) and optional `contact_id` (defaults to the logged-in contact), returns
  whether the contact has permission to perform that action on that entity, as determined by
  all installed implementations of `hook_civicrm_team_permissions`.

## Extending CiviTeams

CiviTeams itself defines no rules about what Team membership grants access to — that logic
lives in `hook_civicrm_team_permissions`, which a companion "plugin" extension implements to
decide, for a given entity table/ID/action/contact, whether the contact's Team memberships
grant them access. `civiteams.api.php` documents the hook signature and includes a worked
example. `CRM_Team_BAO_Team::checkPermissions()` (also exposed as the `Team.Checkpermissions`
API action) invokes every implementation of the hook and requires all of them to return `TRUE`
for access to be granted; users with the core `administer CiviCRM` permission always pass.

## Special configuration requirements

No API keys, credentials, or external service configuration are required. Configuration is
limited to:

* Granting the `access civiteams` and/or `administer civiteams` permissions to the
  appropriate CiviCRM user roles.
* Creating Teams and assigning Contacts to them via the **Manage Teams** screen and Contact
  Search Actions described above.
* Installing and configuring a companion extension that implements
  `hook_civicrm_team_permissions` if you want Team membership to actually govern access to
  something.

## Requirements

* CiviCRM 5.67+ (per `info.xml` compatibility).

## Installation (Web UI)

Learn more about installing CiviCRM extensions in the [CiviCRM Sysadmin
Guide](https://docs.civicrm.org/sysadmin/en/latest/customize/extensions/). Once installed,
enable it using its extension key, `civiteams`.


About the Authors
-----------------

This CiviCRM extension was developed by the team at [Agileware](https://agileware.com.au).

[Agileware](https://agileware.com.au) provide a range of CiviCRM services including:

  * CiviCRM migration
  * CiviCRM integration
  * CiviCRM extension development
  * CiviCRM support
  * CiviCRM hosting
  * CiviCRM remote training services

Support your Australian [CiviCRM](https://civicrm.org) developers, [contact Agileware](https://agileware.com.au/contact) today!

![Agileware](logo/agileware-logo.png)
