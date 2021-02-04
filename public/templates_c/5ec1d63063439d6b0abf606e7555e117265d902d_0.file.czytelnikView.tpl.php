<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-04 15:48:52
  from 'C:\XAMPP\htdocs\biblioteka\app\views\czytelnikView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601c09541cf847_52424735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ec1d63063439d6b0abf606e7555e117265d902d' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\czytelnikView.tpl',
      1 => 1612450090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601c09541cf847_52424735 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_309679246601c09541bf691_13515210', 'top');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2119277502601c09541c6163_09879169', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_309679246601c09541bf691_13515210 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_309679246601c09541bf691_13515210',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
<h2>Wyszukiwanie czytelników</h2>
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
listaCzytelnik" method="post">
    <div class="row uniform 50%">
	<div class="6u 12u">
            <input type="text" name="nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->nazwisko;?>
" placeholder=" Wpisz nazwisko czytelnika" /><br />
        </div>
        <div class="12u">
            <ul class="actions">
		<li><input type="submit" value="Szukaj" class="special small" /></li>
                &nbsp;
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
dodajCzytelnik" class="button small">Dodaj nowego Czytelnika</a></li> 
            </ul>
        </div>
    </div>
    
</form>	
</div>
<?php }
}
}
/* {/block 'top'} */
/* {block 'content'} */
class Block_2119277502601c09541c6163_09879169 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2119277502601c09541c6163_09879169',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
<div id="c" name="c" class="table-wrapper">
    <table class="alt">
        <thead>
            <tr>
                <th>ID Czytelnika</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>PESEL</th>
                <th>Opcje</th>
            </tr>   
        </thead>

        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['czytelnik']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
        <tr><td><?php echo $_smarty_tpl->tpl_vars['c']->value["ID_czytelnika"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["nazwisko"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["imie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["pesel"];?>
</td><td><ul class="actions small"><li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
edytujCzytelni?id=<?php echo $_smarty_tpl->tpl_vars['c']->value['ID_czytelnik'];?>
" class="button special small">Edytuj</a></li>&nbsp;<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
usunCzytelnik?id=<?php echo $_smarty_tpl->tpl_vars['c']->value['ID_czytelnik'];?>
" class="button small">Usuń</a></li>&nbsp;<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
historiaWypozyczen?id=<?php echo $_smarty_tpl->tpl_vars['c']->value['ID_czytelnik'];?>
" class="button small">Historia wypożyczeń</a></li></ul></td></tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>           
    </table>
</div>       
<?php }
}
}
/* {/block 'content'} */
}
