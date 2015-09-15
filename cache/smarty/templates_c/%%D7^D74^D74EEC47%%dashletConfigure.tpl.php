<?php /* Smarty version 2.6.11, created on 2015-09-07 18:47:33
         compiled from modules/AOR_Reports/Dashlets/AORReportsDashlet/dashletConfigure.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'modules/AOR_Reports/Dashlets/AORReportsDashlet/dashletConfigure.tpl', 110, false),)), $this); ?>
<div>
    <form action='index.php' name='EditView' id='configure_<?php echo $this->_tpl_vars['id']; ?>
' method='post' onSubmit='return SUGAR.dashlets.postForm("configure_<?php echo $this->_tpl_vars['id']; ?>
", SUGAR.mySugar.uncoverPage);'>
        <input type='hidden' name='id' value='<?php echo $this->_tpl_vars['id']; ?>
'>
        <input type='hidden' name='module' value='Home'>
        <input type='hidden' name='action' value='ConfigureDashlet'>
        <input type='hidden' name='configure' value='true'>
        <input type='hidden' name='to_pdf' value='true'>

        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="edit view">
            <tr>
                <td scope='row'>
                    <?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_TITLE']; ?>

                </td>
                <td>
                    <input type='text' name='dashletTitle' value='<?php echo $this->_tpl_vars['dashletTitle']; ?>
'>
                </td>
            </tr>
            <tr>
                <td scope='row'>
                    <?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_REPORT']; ?>

                </td>
                <td>
                    <input type="text" name="aor_report_name" class="sqsEnabled" tabindex="0" id="aor_report_name" size="" value="<?php echo $this->_tpl_vars['aor_report_name']; ?>
" title='' autocomplete="off">
                    <input type="hidden" name="aor_report_id" id="aor_report_id" value="<?php echo $this->_tpl_vars['aor_report_id']; ?>
">
                    <span class="id-ff multiple">
                        <button type="button" name="btn_aor_report_name" id="btn_aor_report_name" tabindex="0" title="<?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_SELECT_REPORT']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_SELECT_REPORT']; ?>
"
                                <?php echo '
                                    onclick=\'open_popup(
                                            "AOR_Reports",
                                            600,
                                            400,
                                            "",
                                            true,
                                            false,
                                            {"call_back_function":"aor_report_set_return","form_name":"EditView","field_to_name_array":{"id":"aor_report_id","name":"aor_report_name"}},
                                            "single",
                                            true
                                    );\' >
                                '; ?>

                            <img src="themes/default/images/id-ff-select.png">
                        </button>
                        <button type="button" name="btn_clr_aor_report_name" id="btn_clr_aor_report_name" tabindex="0" title="<?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_CLEAR_REPORT']; ?>
"  class="button lastChild"
                            onclick="SUGAR.clearRelateField(this.form, 'aor_report_name', 'aor_report_id');"  value="<?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_CLEAR_REPORT']; ?>
" >
                            <img src="themes/default/images/id-ff-clear.png">
                        </button>
                    </span>
                    <script type="text/javascript">
                        <?php echo '
                        if(typeof sqs_objects == \'undefined\'){
                            var sqs_objects = new Array;
                        }
                        sqs_objects[\'EditView\']={
                            "form":"EditView",
                            "method":"query",
                            "modules": ["AOR_Reports"],
                            "field_list":["name","id"],
                            "populate_list":["aor_report_name","aor_report_id"],
                            "required_list":["aor_report_id"],
                            "conditions": [{
                                "name": "name",
                                "op": "like_custom",
                                "end": "%",
                                "value": ""
                            }],
                            "limit":"30",
                            "no_match_text":"No Match"};
                        SUGAR.util.doWhen(
                                "typeof(sqs_objects) != \'undefined\' && typeof(sqs_objects[\'EditView_aor_report_name\']) != \'undefined\'",
                                enableQS
                        );
                        '; ?>

                    </script>
                </td>
            </tr>
            <tr>
                <td scope='row'>
                    <label for="onlyCharts<?php echo $this->_tpl_vars['id']; ?>
">
                        <?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_ONLY_CHARTS']; ?>

                    </label>
                </td>
                <td>
                    <input type='checkbox' id='onlyCharts<?php echo $this->_tpl_vars['id']; ?>
' name='onlyCharts' <?php if ($this->_tpl_vars['onlyCharts']): ?>checked='checked'<?php endif; ?>>
                </td>
            </tr>
            <tr>
                <td scope='row'>
                    <?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_CHARTS']; ?>

                </td>
                <td>
                    <select multiple="multiple" name="charts[]" id="charts<?php echo $this->_tpl_vars['id']; ?>
">
                        <?php echo $this->_tpl_vars['chartOptions']; ?>

                    </select>
                </td>
            </tr>
            <?php $_from = $this->_tpl_vars['parameters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['condition']):
?>
            <tr>
                <td scope='row'>
                    <?php echo $this->_tpl_vars['MOD']['LBL_PARAMETERS']; ?>

                </td>
                <td>
                    <div id="parameterOptions<?php echo $this->_tpl_vars['id']; ?>
">

                            <input type='hidden' name='parameter_id[]' value='<?php echo $this->_tpl_vars['condition']['id']; ?>
'>
                            <input type='hidden' name='parameter_operator[]' value='<?php echo $this->_tpl_vars['condition']['operator']; ?>
'>
                            <input type='hidden' name='parameter_type[]' value='<?php echo $this->_tpl_vars['condition']['value_type']; ?>
'>

                        <?php if ($this->_tpl_vars['condition']['value_type'] == 'Period'): ?>
                            <?php echo $this->_tpl_vars['condition']['module_display']; ?>
 - <em><?php echo $this->_tpl_vars['condition']['field_display']; ?>
</em> - <?php echo $this->_tpl_vars['condition']['operator_display']; ?>

                            <select name='parameter_value[]'>
                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['date_time_period_list'],'selected' => $this->_tpl_vars['condition']['value']), $this);?>

                            </select>
                        <?php elseif ($this->_tpl_vars['condition']['value_type'] == 'Relate'): ?>

                        <?php else: ?>
                            <?php echo $this->_tpl_vars['condition']['module_display']; ?>
 - <em><?php echo $this->_tpl_vars['condition']['field_display']; ?>
</em> - <?php echo $this->_tpl_vars['condition']['operator_display']; ?>
  <?php echo $this->_tpl_vars['condition']['field']; ?>

                        <?php endif; ?>

                    </div>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
            <tr>
                <td scope='row'>

                </td>
                <td align='right'>
                    <input type='submit' class='button' value='<?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_SAVE']; ?>
'>
                </td>
            </tr>
        </table>
    </form>
</div>
<script>
    <?php echo '
    function loadCharts(reportId){
        $.getJSON(\'index.php\',
                {module : \'AOR_Reports\',
                    record : reportId,
                    to_pdf : 1,
                    action : \'getChartsForReport\'}).done(
                function(data){
                    var chartSelect = $(\'#charts';  echo $this->_tpl_vars['id'];  echo '\');
                    chartSelect.empty();
                    $.each(data, function(key,val){
                        chartSelect.append($(\'<option></option\').val(key).text(val));
                    });
                }
        );
    }
    function loadParameters(reportId){
        $.getJSON(\'index.php\',
                {module : \'AOR_Reports\',
                    record : reportId,
                    to_pdf : 1,
                    action : \'getParametersForReport\'}).done(
                function(data){
                    var paramContainer = $(\'#parameterOptions';  echo $this->_tpl_vars['id'];  echo '\');
                    var html = \'\';
                    for(var x = 0; x < data.length; x++) {
                        var cond = data[x];
                        html += "<input type=\'hidden\' name=\'parameter_id[]\' value=\'"+cond.id+"\'>";
                        html += "<input type=\'hidden\' name=\'parameter_operator[]\' value=\'"+cond.operator+"\'>";
                        html += "<input type=\'hidden\' name=\'parameter_type[]\' value=\'"+cond.value_type+"\'>";
                        html += cond.module_display+" "+cond.field_display+" "+cond.operator_display+" "+cond.field;
                    }
                    paramContainer.html(html);
                }
        );
    }
    function aor_report_set_return(ret){
        loadCharts(ret.name_to_value_array.aor_report_id);
        loadParameters(ret.name_to_value_array.aor_report_id);
        set_return(ret);
    }
    '; ?>

</script>