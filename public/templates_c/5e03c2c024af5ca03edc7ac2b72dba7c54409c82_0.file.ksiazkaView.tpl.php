<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-26 10:54:29
  from 'C:\XAMPP\htdocs\biblioteka\app\views\templates\ksiazkaView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600fe6d51eaed2_63554929',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e03c2c024af5ca03edc7ac2b72dba7c54409c82' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\templates\\ksiazkaView.tpl',
      1 => 1611651817,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600fe6d51eaed2_63554929 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1126527689600fe6d51dc5d7_21392551', 'szukaj');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "start.tpl");
}
/* {block 'szukaj'} */
class Block_1126527689600fe6d51dc5d7_21392551 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'szukaj' => 
  array (
    0 => 'Block_1126527689600fe6d51dc5d7_21392551',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
wyszukajKsiazke" method="post" class="wrapper style3 special">
	<legend>Wyszukaj interesujący Cię tytuł</legend>
	<fieldset>
            <input type="text" placeholder ="Tytuł książki" name="tytul" value="<?php echo $_smarty_tpl->tpl_vars['znajdzKsiazke']->value->tytul;?>
"/><br />
            <input type="submit" value="Szukaj" class="special"/>
	</fieldset>
    </form>	
</div>



          
<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Tytuł</th>
		<th>Nazwisko Autora</th>
		<th>Imię Autora</th>
		<th>Kategoria</th>
		<th>stan</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ksiazka']->value, 'k');
$_smarty_tpl->tpl_vars['k']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
$_smarty_tpl->tpl_vars['k']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['k']->value["tytul"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["Nazwisko_Autora"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["Imie_Autora"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["kategoria"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["stan"];?>
</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>           

<?php
}
}
/* {/block 'szukaj'} */
}
