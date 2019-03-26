{if $form.soft_credit_name}
  <div class="crm-softcredit-form-block-soft_credit_sort_name">
    {$form.soft_credit_name.label}<br>
    {$form.soft_credit_name.html}
  </div>
{/if}
{if $contributionSoftGroupTree}
  <div class="softcredit_custom_groups">
    <br>
    {include file="CRM/Custom/Form/Search.tpl" groupTree=$contributionSoftGroupTree showHideLinks=false}
  </div>
{/if}
{if $contributionSoftGroupTree OR $form.soft_credit_name}
  <script type="text/javascript">
  {literal}
    CRM.$(function($) {
      $('div#contribution_soft_credit_type_wrapper').append($('div.crm-softcredit-form-block-soft_credit_sort_name'));
      $('div#contribution_soft_credit_type_wrapper').append($('div.softcredit_custom_groups'));

      hideShowInMemoryOf();
      $('select#contribution_or_softcredits').change(hideShowInMemoryOf);

      function hideShowInMemoryOf() {
        let softOption = $('select#contribution_or_softcredits').val();
        if (softOption == 'only_contribs') {
          $('div#contribution_soft_credit_type_wrapper').show();
        }
      }

    });
  {/literal}
  </script>
{/if}
