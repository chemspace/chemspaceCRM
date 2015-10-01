<?php /* Smarty version 2.6.11, created on 2015-09-15 10:24:37
         compiled from include/SugarFields/Fields/CronSchedule/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/CronSchedule/EditView.tpl', 2, false),)), $this); ?>
<script type="text/javascript" src='{sugar_getjspath file="include/SugarFields/Fields/CronSchedule/SugarFieldCronSchedule.js"}'></script>
{if strlen(<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
) <= 0}
    {assign var="value" value=<?php echo smarty_function_sugarvar(array('key' => 'default_value','string' => true), $this);?>
 }
{else}
    {assign var="value" value=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 }
{/if}
<input type='hidden'
       name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>'
       id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>'
       value='{$value}'>
<label>
    <?php echo $this->_tpl_vars['APP']['LBL_CRON_RAW']; ?>

<input type="checkbox"
       name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw'
       id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw'
        >
</label>
<span style='display:none;' id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_basic'>
<select
        name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_type'
        id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_type'>
    <?php echo $this->_tpl_vars['types']; ?>

</select>

<span id="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_monthly_options" style="display: none">
    <?php echo $this->_tpl_vars['APP']['LBL_CRON_ON_THE_MONTHDAY']; ?>

    <select
            multiple="multiple"
            name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_days'
            id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_days'>
        <?php echo $this->_tpl_vars['days']; ?>

    </select>

</span>
<span id="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_weekly_options" style="display: none">
    <?php echo $this->_tpl_vars['APP']['LBL_CRON_ON_THE_WEEKDAY']; ?>

    <select
            multiple="multiple"
            name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_weekdays'
            id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_weekdays'>
        <?php echo $this->_tpl_vars['weekdays']; ?>

    </select>

</span>
<?php echo $this->_tpl_vars['APP']['LBL_CRON_AT']; ?>

<select
        type="text"
        name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_time_hours'
        id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_time_hours'
        value="23:00"
        ><?php echo $this->_tpl_vars['hours']; ?>
</select>:
    <select
            type="text"
            name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_time_minutes'
            id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_time_minutes'
            value="23:00"
            >
        <?php echo $this->_tpl_vars['minutes']; ?>

        </select>
</span>
<span style='display:none;' id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_advanced'>
    <label><?php echo $this->_tpl_vars['APP']['LBL_CRON_MIN']; ?>

    <input type="text"
           size="2"
           name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_minutes'
           id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_minutes'
            >
    </label>
    <label><?php echo $this->_tpl_vars['APP']['LBL_CRON_HOUR']; ?>

    <input type="text"
           size="2"
           name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_hours'
           id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_hours'
            >
    </label>
    <label><?php echo $this->_tpl_vars['APP']['LBL_CRON_DAY']; ?>

    <input type="text"
           size="2"
           name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_day'
           id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_day'
            >
    </label>
    <label><?php echo $this->_tpl_vars['APP']['LBL_CRON_MONTH']; ?>

    <input type="text"
           size="2"
           name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_month'
           id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_month'
            >
    </label>
    <label><?php echo $this->_tpl_vars['APP']['LBL_CRON_DOW']; ?>

    <input type="text"
           size="2"
           placeholder=""
           name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_weekday'
           id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>_raw_weekday'
            >
    </label>

    </span>

<script>
    {literal}
    $(document).ready(function(){
        {/literal}
        var id = '<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>';
        {literal}

        $('#'+id+'_type').on('change',function(){
           updateCRONType(id);
        });
        $('#'+id+'_raw').on('change',function(){
            updateCRONDisplay(id);
        });
        $('#'+id+'_basic').on('change',function(){
            updateCRONValue(id);
        });
        var rawChange = function(){
            updateCRONValue(id);
        }
        $('#'+id+'_raw_minutes').change(rawChange);
        $('#'+id+'_raw_hours').change(rawChange);
        $('#'+id+'_raw_day').change(rawChange);
        $('#'+id+'_raw_month').change(rawChange);
        $('#'+id+'_raw_weekday').change(rawChange);
        updateCRONDisplay(id);
        updateCRONType(id);
        updateCRONFields(id);
    });
    {/literal}
</script>