<table class="form-layout-compressed crm-soft-credit-block">
  {section name='i' start=1 loop=$rowCount}
    {assign var='blockId' value=$smarty.section.i.index}
    <tr id="soft-credit-custom_row-{$blockId}" class="customFieldIgnore {if $blockId gte $showSoftCreditRow}hiddenElement{/if}" >
      <td colspan='3'>
        {foreach from=$soft_credit_custom_groupTree.$blockId item=cd_edit key=group_id name=custom_sets}
          {if $cd_edit.is_multiple and $multiRecordDisplay eq 'single'}
            {assign var="isSingleRecordEdit" value=TRUE}
          {else}
            {* always assign to prevent leakage*}
            {assign var="isSingleRecordEdit" value=''}
          {/if}
          {if $isSingleRecordEdit}
            <div class="custom-group custom-group-{$cd_edit.name}">
              {include file="CRM/Custom/Form/Edit/CustomData.tpl" customDataEntity='soft_credit_custom'}
            </div>
          {else}
           <div class="custom-group custom-group-{$cd_edit.name} crm-accordion-wrapper crm-custom-accordion {if $cd_edit.collapse_display and !$skipTitle}collapsed{/if}">
            {if !$skipTitle}
            <div class="crm-accordion-header">
              {$cd_edit.title}
             </div><!-- /.crm-accordion-header -->
            {/if}
            <div class="crm-accordion-body">
              {include file="CRM/Custom/Form/Edit/CustomData.tpl" customDataEntity='soft_credit_custom'}
            </div>
           </div>
          {/if}
          <div id="custom_group_{$group_id}_{$blockId}"></div>
        {/foreach}
      </td>
    </tr>
  {/section}
</table>

<script type="text/javascript">
{literal}
  CRM.$(function($) {
    $('div#softCredit table tr[id*="soft-credit-row-"]').each(function() {
      if (!$(this).hasClass('customFieldIgnore')) {
        var trId = this.id;
        var $id = trId.replace('soft-credit-row-', '');
        $($('tr#soft-credit-custom_row-' + $id)).insertAfter('div#softCredit table tr#' + trId);
      }
    });

    $('#addMoreSoftCredit').on('click', function () {
      if ($('tr.customFieldIgnore').hasClass("hiddenElement")) {
        $('.crm-contribution-form-block-soft_credit_to tr.hiddenElement').filter(':first').show().removeClass('hiddenElement');
      }
      if ($('.crm-soft-credit-block tr.hiddenElement').length < 1) {
        $('#addMoreSoftCredit').hide();
      }
      return false;
    });
    $('.soft-credit-delete-link').click(function() {
      var closestTr = $(this).closest('tr').get(0).id;
      var $id = closestTr.replace('soft-credit-row-', '');
      $('tr#soft-credit-custom_row-' + $id).addClass('hiddenElement').removeAttr('style');
      return false;
    });
  });
{/literal}
</script>
