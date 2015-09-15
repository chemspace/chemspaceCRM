<?php /* Smarty version 2.6.11, created on 2015-09-07 18:47:16
         compiled from modules/AOR_Reports/Dashlets/AORReportsDashlet/dashlet.tpl */ ?>
<?php if (! $this->_tpl_vars['onlyCharts']): ?>
    <?php echo '
        <script>
                function changeReportPage(record, offset, group_value, table_id){
                    params = reportDashletParams[record];
                    $.get(\'index.php\',
                            {module : \'AOR_Reports\',
                                record : record,
                                offset : offset,
                                table_id : table_id,
                                \'parameter_id\' : params[\'ids\'],
                                \'parameter_operator\' : params[\'operators\'],
                                \'parameter_type\' : params[\'types\'],
                                \'parameter_value\' : params[\'values\'],
                                action : \'changeReportPage\'}).done(
                            function(data){
                                $(\'#dashlet_\'+table_id+\' .aor_report_contents\').html(data);
                            }
                    );
                }
            $(document).ready(function(){
                if(\'';  echo $this->_tpl_vars['report_id'];  echo '\'){
                    if(typeof reportDashletParams === \'undefined\'){
                        reportDashletParams = [];
                    }
                    reportDashletParams[\'';  echo $this->_tpl_vars['report_id'];  echo '\'] = ';  echo $this->_tpl_vars['parameters'];  echo '
                    changeReportPage(\'';  echo $this->_tpl_vars['report_id'];  echo '\',0,\'\',\'';  echo $this->_tpl_vars['dashlet_id'];  echo '\');
                }
            });

        </script>
    '; ?>

    <div class="aor_report_contents">
        <?php echo $this->_tpl_vars['MOD']['LBL_DASHLET_CHOOSE_REPORT']; ?>


    </div>
<?php endif; ?>
<div style="padding: 10px">
    <?php echo $this->_tpl_vars['chartHTML']; ?>

</div>

<script src="modules/AOR_Reports/Dashlets/AORReportsDashlet/AORReportsDashlet.js"></script>