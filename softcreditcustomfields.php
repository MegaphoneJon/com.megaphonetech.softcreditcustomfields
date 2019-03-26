<?php

require_once 'softcreditcustomfields.civix.php';
use CRM_Softcreditcustomfields_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function softcreditcustomfields_civicrm_config(&$config) {
  _softcreditcustomfields_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function softcreditcustomfields_civicrm_xmlMenu(&$files) {
  _softcreditcustomfields_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function softcreditcustomfields_civicrm_install() {
  _softcreditcustomfields_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function softcreditcustomfields_civicrm_postInstall() {
  _softcreditcustomfields_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function softcreditcustomfields_civicrm_uninstall() {
  _softcreditcustomfields_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function softcreditcustomfields_civicrm_enable() {
  _softcreditcustomfields_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function softcreditcustomfields_civicrm_disable() {
  _softcreditcustomfields_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function softcreditcustomfields_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _softcreditcustomfields_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function softcreditcustomfields_civicrm_managed(&$entities) {
  _softcreditcustomfields_civix_civicrm_managed($entities);
  $entities[] = [
    'module' => 'com.megaphonetech.softcreditcustomfields',
    'name' => 'softCreditCustomfield',
    'update' => 'never',
    'entity' => 'OptionValue',
    'params' => [
      'label' => ts('Contribution Soft'),
      'name' => 'civicrm_contribution_soft',
      'value' => 'ContributionSoft',
      'option_group_id' => 'cg_extend_objects',
      'options' => ['match' => ['option_group_id', 'name']],
      'is_active' => 1,
      'version' => 3,
    ],
  ];
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function softcreditcustomfields_civicrm_caseTypes(&$caseTypes) {
  _softcreditcustomfields_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function softcreditcustomfields_civicrm_angularModules(&$angularModules) {
  _softcreditcustomfields_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function softcreditcustomfields_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _softcreditcustomfields_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function softcreditcustomfields_civicrm_entityTypes(&$entityTypes) {
  _softcreditcustomfields_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 */
function softcreditcustomfields_civicrm_preProcess($formName, &$form) {
  if (in_array($formName, ['CRM_Contribute_Form_Search', 'CRM_Contact_Form_Search_Advanced'])) {
    $extendsMap = &CRM_Core_BAO_CustomQuery::$extendsMap;
    $extendsMap['ContributionSoft'] = 'civicrm_contribution_soft';
  }
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildForm
 */
function softcreditcustomfields_civicrm_buildForm($formName, &$form) {
  if (('CRM_Contribute_Form_Search' == $formName && $form->getVar('_context') == 'search')
    || ('CRM_Contact_Form_Search_Advanced' == $formName && ('CiviContribute' == $form->_searchPane || $form->_flagSubmitted))
  ) {
    CRM_Contribute_BAO_Query::addCustomFormFields($form, ['ContributionSoft']);
    $form->add('text', 'soft_credit_name', ts('Soft Creditee\'s name'));
    if ('CRM_Contact_Form_Search_Advanced' == $formName && 'CiviContribute' != $form->_searchPane) {
      return;
    }
    CRM_Core_Region::instance('page-footer')->add(array(
      'template' => "CRM/Contribute/Form/Search/SoftCredit-Search.tpl",
    ));
  }
  if ('CRM_Contribute_Form_ContributionView' == $formName) {
    $softCredits = $form->get_template_vars('softContributions');
    if (!empty($softCredits)) {
      $softCreditIds = [];
      foreach ($softCredits as $key => $softCredit) {
        $softCreditIds[] = $softCredit['soft_credit_id'];
        // add custom data of type soft credit
        $groupTree = CRM_Core_BAO_CustomGroup::getTree('ContributionSoft', NULL, $softCredit['soft_credit_id']);
        // we setting the prefix to dnc_ below so that we don't overwrite smarty's grouptree var.
        $softCredits[$key]['custom'] = CRM_Core_BAO_CustomGroup::buildCustomDataView($form, $groupTree, FALSE, NULL, "dnc_");
      }
      $form->assign('softContributions', $softCredits);
      $form->assign('softCreditIds', json_encode($softCreditIds));
      CRM_Core_Region::instance('page-footer')->add(array(
        'template' => "CRM/Contribute/Page/View/SoftCredit-Custom.tpl",
      ));
    }
  }
  if ('CRM_Contribute_Form_Contribution' == $formName && !($form->getVar('_action') & CRM_Core_Action::DELETE)) {
    CRM_Core_Region::instance('page-footer')->add(array(
      'template' => "CRM/Contribute/Form/SoftCredit-Custom.tpl",
    ));

    for ($blockId = 1; $blockId <= 10; $blockId++) {
      $entityId = CRM_Utils_Array::value(
        'soft_credit_id',
        CRM_Utils_Array::value(
          $blockId,
          CRM_Utils_Array::value('soft_credit', $form->_softCreditInfo)
        )
      );
      _softcreditcustomfields_addCustomDataToForm($form, $entityId, $blockId);
    }
    if ($form->_flagSubmitted) {
      $submitValues = $form->_submitValues;
      foreach ($form->_required as $key => $fieldName) {
        if (strpos($fieldName, 'soft_credit_custom[') !== FALSE) {
          $fieldName = str_replace('soft_credit_custom[', '', $fieldName);
          $blockId = strstr($fieldName, ']', TRUE);
          if (empty($submitValues['soft_credit_amount'][$blockId])) {
            unset($form->_required[$key]);
          }
        }
      }
    }
  }
}
/**
 * Add custom data to the form.
 *
 * @param CRM_Core_Form $form
 * @param int $entityId
 * @param int $blockId
 */
function _softcreditcustomfields_addCustomDataToForm(&$form, $entityId, $blockId) {
  $groupTree = CRM_Core_BAO_CustomGroup::getTree('ContributionSoft', NULL, $entityId);

  if (isset($groupTree) && is_array($groupTree)) {
    // use simplified formatted groupTree
    $groupTree = CRM_Core_BAO_CustomGroup::formatGroupTree($groupTree, 1, $form);
    // make sure custom fields are added /w element-name in the format - 'soft_credit_amount[$blockId][custom-X]'
    foreach ($groupTree as $id => $group) {
      foreach ($group['fields'] as $fldId => $field) {
        $groupTree[$id]['fields'][$fldId]['element_custom_name'] = $field['element_name'];
        $groupTree[$id]['fields'][$fldId]['element_name'] = "soft_credit_custom[$blockId][{$field['element_name']}]";
      }
    }

    $defaults = [];
    CRM_Core_BAO_CustomGroup::setDefaults($groupTree, $defaults);

    // since we change element name for softCredit custom data, we need to format the setdefault values
    $softCreditDefaults = [];
    foreach ($defaults as $key => $val) {
      if (empty($val)) {
        continue;
      }

      // inorder to set correct defaults for checkbox custom data, we need to converted flat key to array
      // this works for all types custom data
      $keyValues = explode('[', str_replace(']', '', $key));
      $softCreditDefaults[$keyValues[0]][$keyValues[1]][$keyValues[2]] = $val;
    }

    $form->setDefaults($softCreditDefaults);

    // we setting the prefix to 'dnc_' below, so that we don't overwrite smarty's grouptree var.
    // And we can't set it to 'soft_credit_' because we want to set it in a slightly different format.
    CRM_Core_BAO_CustomGroup::buildQuickForm($form, $groupTree, FALSE, 'dnc_');

    $tplGroupTree = CRM_Core_Smarty::singleton()
      ->get_template_vars('soft_credit_custom_groupTree');
    $tplGroupTree = empty($tplGroupTree) ? [] : $tplGroupTree;

    $form->assign('soft_credit_custom_groupTree', $tplGroupTree + [$blockId => $groupTree]);
    // unset the temp smarty var that got created
    $form->assign('dnc_groupTree', NULL);
  }
  // softCredit custom data processing ends ..
}

/**
 * Implements hook_civicrm_postProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postProcess
 */
function softcreditcustomfields_civicrm_postProcess($formName, &$form) {
  if ('CRM_Contribute_Form_Contribution' == $formName
    && !($form->getVar('_action') & CRM_Core_Action::DELETE)
  ) {
    $contributionId = $form->getVar('_id');
    $params = $form->getVar('_params');
    if (empty($params['soft_credit_custom'])) {
      return;
    }
    if (!empty($params['soft_credit_contact_id'])) {
      foreach ($params['soft_credit_contact_id'] as $key => $softContactId) {
        if ($softContactId
          && isset($params['soft_credit_amount'][$key])
          && !empty($params['soft_credit_custom'][$key])
        ) {
          $softParams = [
            'contribution_id' => $contributionId,
            'contact_id' => $softContactId,
            'amount' => $params['soft_credit_amount'][$key],
            'return' => 'id',
          ];
          if (!empty($params['soft_credit_type'][$key])) {
            $softParams['soft_credit_type_id'] = $params['soft_credit_type'][$key];
          }
          try {
            $softContributionId = civicrm_api3('ContributionSoft', 'getvalue', $softParams);
            $softParams = [
              'id' => $softContributionId,
            ] + $params['soft_credit_custom'][$key];
            civicrm_api3('ContributionSoft', 'create', $softParams);
          }
          catch (Exception $e) {
            continue;
          }
        }
      }
    }
  }
}

/**
 * Implements hook_civicrm_queryObjects().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_queryObjects
 */
function softcreditcustomfields_civicrm_queryObjects(&$queryObjects, $type) {
  if ($type == 'Contact') {
    $queryObjects[] = new CRM_SoftCredit_SoftCreditQueryObject();
  }
}

/**
 * Implements hook_civicrm_queryObjects().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_queryObjects
 */
function softcreditcustomfields_civicrm_alterContent(&$content, $context, $tplName, &$object) {
  if (in_array($tplName, [
    'CRM/Contribute/Form/Search/AdvancedSearchPane.tpl',
    'CRM/Contribute/Form/Search.tpl'
  ])) {
    $content = str_replace(
      "cj('#contribution_soft_credit_type_id').val('');", 
      '', 
      $content
    );
  }
}
