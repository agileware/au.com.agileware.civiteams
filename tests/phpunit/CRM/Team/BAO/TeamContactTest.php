<?php

use CRM_Team_ExtensionUtil as E;
use Civi\Test\HeadlessInterface;
use Civi\Test\HookInterface;
use Civi\Test\TransactionalInterface;

/**
 * Test class for TeamContact BAO and it's methods.
 * @group headless
 */
class CRM_Team_BAO_TeamContactTest extends CiviUnitTestCase implements HeadlessInterface {

  public function setUpHeadless() {
    // Comment following block out to setup headdless database.
    /*return \Civi\Test::headless()
      ->installMe(__DIR__)
      ->apply();*/
  }

  public function setUp() {
    parent::setUp();
  }

  public function tearDown() {
    parent::tearDown();
  }

  /**
   * Test that a team contact is not created with empty parameters.
   */
  public function testCreateWithEmptyParams() {
    $params = array();
    $teamContact = CRM_Team_BAO_Team::create($params);
    $this->assertNull($teamContact);
  }

  /**
   * Test that a team contact is not created with only team.
   */
  public function testCreateWithOnlyTeam() {
    $team = $this->createTeam();
    $params = array(
      "team_id" => $team->id
    );
    $teamContact = CRM_Team_BAO_TeamContact::create($params);
    $this->assertNull($teamContact);
  }

  /**
   * Test that a team contact is not created with only contact.
   */
  public function testCreateWithOnlyContact() {
    $contactId = $this->individualCreate();
    $params = array(
      "contact_id" => $contactId
    );
    $teamContact = CRM_Team_BAO_TeamContact::create($params);
    $this->assertNull($teamContact);
  }

  /**
   * Test that a team contact is created with minimum required parameters.
   */
  public function testCreateWithMinimumParams() {
    $contactId = $this->individualCreate();
    $team = $this->createTeam();
    $params = array(
      "contact_id" => $contactId,
      "team_id"    => $team->id,
      "status"     => 1
    );
    $teamContact = CRM_Team_BAO_TeamContact::create($params);
    $this->assertInstanceOf('CRM_Team_BAO_TeamContact', $teamContact, 'Check for created object');
    $this->assertEquals($team->id, $teamContact->team_id, 'Check for team id.');
    $this->assertEquals($contactId, $teamContact->contact_id, 'Check for contact id.');
  }

  /**
   * Test that a team contact is created and found contacts by team id.
   */
  public function testFetchContactsByTeam() {
    $team = $this->addTeamWithTwoContacts();
    $searchParams = array(
      "team_id"  =>  $team->id,
    );
    $teamContact = new CRM_Team_BAO_TeamContact();
    $teamContact->copyValues($searchParams);
    $this->assertEquals(2, $teamContact->find(), 'Check for the count of team contacts.');
  }

  /**
   * Test that a team contact is created with minimum required parameters.
   */
  public function testDelete() {
    $team = $this->addTeamWithTwoContacts();
    $searchParams = array(
      "team_id"  =>  $team->id,
    );
    $teamContact = new CRM_Team_BAO_TeamContact();
    $teamContact->copyValues($searchParams);
    $this->assertEquals(TRUE, $teamContact->delete(), 'Check if team contacts deleted.');
  }

  /*
   * Creating a team for test with two contacts
   */
  private function addTeamWithTwoContacts() {
    $contactId = $this->individualCreate();
    $contactId2 = $this->individualCreate();
    $team = $this->createTeam();
    $params = array(
      "contact_id" => $contactId,
      "team_id"    => $team->id,
      "status"     => 1
    );

    $params2 = array(
      "contact_id" => $contactId2,
      "team_id"    => $team->id,
      "status"     => 1
    );
    $teamContact = CRM_Team_BAO_TeamContact::create($params);
    $teamContact2 = CRM_Team_BAO_TeamContact::create($params2);

    $this->assertInstanceOf('CRM_Team_BAO_TeamContact', $teamContact, 'Check for created object');
    $this->assertInstanceOf('CRM_Team_BAO_TeamContact', $teamContact2, 'Check for created object');

    return $team;
  }

  /*
   * Creating a team for test
   */
  private function createTeam() {
    $teamName = "Agileware Team";
    $params = array(
      "team_name" => $teamName
    );
    $team = CRM_Team_BAO_Team::create($params);
    return $team;
  }
}
