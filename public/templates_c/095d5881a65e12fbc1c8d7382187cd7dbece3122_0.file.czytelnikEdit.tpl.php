<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-05 01:11:06
  from 'C:\XAMPP\htdocs\biblioteka\app\views\czytelnikEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601c8d1a95e8b1_88211619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '095d5881a65e12fbc1c8d7382187cd7dbece3122' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\czytelnikEdit.tpl',
      1 => 1612483863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601c8d1a95e8b1_88211619 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_582721980601c8d1a9589b3_17543188', 'edycja');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'edycja'} */
class Block_582721980601c8d1a9589b3_17543188 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'edycja' => 
  array (
    0 => 'Block_582721980601c8d1a9589b3_17543188',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <h2>Edytuj/Dodaj Czytelnika</h2>
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
zapiszCzytelnik" method="post" class="row uniform 100%">
        <fieldset>
            <div class="6u 12u">
                <label for="nazwisko">Nazwisko</label>
                <input id="nazwisko" type="text" placeholder="NAZWISKO" name="nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwisko;?>
">
            </div>
            <div class="6u 12u">
                <label for="imie">Imię</label>
                <input id="imie" type="text" placeholder="IMIĘ" name="imie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->imie;?>
">
            </div>
            <div class="6u 12u">
                <label for="pesel">PESEL</label>
                <input id="pesel" type="text" maxlenth="11" placeholder="PESEL" name="pesel" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->pesel;?>
">
            </div>
            <div class="actions">
          	<input type="submit" class="special small" value="Zapisz"/>
		<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
listaCzytelnik" class="button small">Powrót</a>
            </div>
	</fieldset>
        <input  type="hidden" name="id_czytelnika" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_czytelnika;?>
">
    </form>	
</div>

<?php
}
}
/* {/block 'edycja'} */
}
