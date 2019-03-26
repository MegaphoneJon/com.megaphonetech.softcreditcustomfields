<div id="soft_credit_custom_field_extension_section" class="crm-accordion-wrapper crm-soft-credit-panel">
  <div class="crm-accordion-header">
    {ts}Soft Credit{/ts}
  </div>
  <div class="crm-accordion-body">
    {foreach from=$softContributions item="softCont"}
      <table class="crm-info-panel crm-soft-credit-listing">
        <tr>
          <td>
            <a href="{crmURL p="civicrm/contact/view" q="reset=1&cid=`$softCont.contact_id`"}"
               title="{ts}View contact record{/ts}">{$softCont.contact_name}
            </a>
          </td>
          <td>{$softCont.amount|crmMoney:$currency}
            {if $softCont.soft_credit_type_label}
              ({$softCont.soft_credit_type_label})
            {/if}
          </td>
        </tr>
      </table>
      <!-- add custom data -->
      <div class='softCredit_custom_data_{$softCont.soft_credit_id}'>
        {foreach from=$softCont.custom item=customGroup key=cgId} {* start of outer foreach *}
          {foreach from=$customGroup item=customValue key=cvId}
            <div id="softCredit_custom_{$cgId}"
            class="crm-collapsible crm-softCredit-custom-{$cgId}-accordion
            {if $customValue.collapse_display}collapsed{/if}">
            <div class="crm-accordion-header">
              {$customValue.title}
            </div>
            <div class="crm-accordion-body">
              {foreach from=$customValue.fields item=element key=field_id}
                <table class="crm-info-panel">
                  <tr>
                    {if $element.options_per_line != 0}
                      <td class="label">{$element.field_title}</td>
                      <td class="html-adjust">
                        {* sort by fails for option per line. Added a variable to iterate through the element array*}
                        {foreach from=$element.field_value item=val}
                          {$val}
                          <br/>
                        {/foreach}
                      </td>
                    {else}
                      <td class="label">{$element.field_title}</td>
                      {if $element.field_data_type == 'Money'}
                        {if $element.field_type == 'Text'}
                          <td class="html-adjust">{$element.field_value|crmMoney}</td>
                        {else}
                          <td class="html-adjust">{$element.field_value}</td>
                        {/if}
                      {else}
                        <td class="html-adjust">
                          {if $element.contact_ref_id}
                            <a href='{crmURL p="civicrm/contact/view" q="reset=1&cid=`$element.contact_ref_id`"}'>
                          {/if}
                          {if $element.field_data_type == 'Memo'}
                            {$element.field_value|nl2br}
                          {else}
                            {$element.field_value}
                          {/if}
                          {if $element.contact_ref_id}
                            </a>
                          {/if}
                        </td>
                      {/if}
                    {/if}
                  </tr>
                </table>
              {/foreach}
              </div>
            </div>
          {/foreach}
        {/foreach} {* end of outer custom group foreach *}
        <div class="clear" style="background:white !important; padding-bottom: 5px;"></div>
      </div>
    {/foreach}
  </div>
</div>
<script type="text/javascript">
{literal}
  CRM.$(function($) {
    $("div.crm-soft-credit-pane").replaceWith($('div#soft_credit_custom_field_extension_section'));
  });
{/literal}
</script>
