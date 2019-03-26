<?php

class CRM_SoftCredit_SoftCreditQueryObject extends CRM_Contact_BAO_Query_Interface {

  static $_networkFields = array();

  public function &getFields() {
    return self::$_networkFields;
  }

  /**
   * @param $query
   *
   */
  public function select(&$query) {
  }

  /**
   * @param $query
   *
   */
  public function where(&$query) {
    if (!empty($query->_paramLookup['soft_credit_name'])) {
      list($name, $op, $value, $grouping, $wildcard) = reset($query->_paramLookup['soft_credit_name']);
      if ($value) {
        $query->_where[$grouping][] = "civicrm_contact_creditee.sort_name LIKE '%{$value}%'";
        $query->_whereTables['civicrm_contribution_soft_creditee_contact'] = 1;
        $query->_tables['civicrm_contribution_soft_creditee_contact'] = 1;
        $query->_whereTables['civicrm_contribution_soft'] = 1;
        $query->_tables['civicrm_contribution_soft'] = 1;
        $query->_qill[$grouping][] = ts("%1 %2 - '%3'", [1 => 'Soft Creditee\'s name', 2 => 'LIKE', 3 => $value]);
      }
    }
  }

  /**
   * @param string $name
   * @param $mode
   * @param $side
   *
   */
  public function from($name, $mode, $side) {
    if ($name == 'civicrm_contribution_soft_creditee_contact') {
      return " $side JOIN civicrm_contact civicrm_contact_creditee
        ON (civicrm_contribution_soft.contact_id = civicrm_contact_creditee.id)
      ";
    }
  }

  /**
   * @param $tables
   *
   */
  public function setTableDependency(&$tables) {
  }

  public function getPanesMapper(&$panes) {
  }

  /**
   * @param $panes
   *
   */
  public function registerAdvancedSearchPane(&$panes) {
  }

  /**
   * @param CRM_Core_Form $form
   * @param $type
   *
   */
  public function buildAdvancedSearchPaneForm(&$form, $type) {
  }

  /**
   * @param $paneTemplatePathArray
   * @param $type
   *
   */
  public function setAdvancedSearchPaneTemplatePath(&$paneTemplatePathArray, $type) {
  }

}
