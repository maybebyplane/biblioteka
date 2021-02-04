<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-04 22:30:20
  from 'C:\XAMPP\htdocs\biblioteka\app\views\pracownikView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601c676cd49657_06008319',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79bc2ec7778af8b0b2c254daf98aab8fe05d582f' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\pracownikView.tpl',
      1 => 1612474216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601c676cd49657_06008319 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_382688201601c676cd39f92_90477311', 'top');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1224061059601c676cd41232_01012086', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_382688201601c676cd39f92_90477311 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_382688201601c676cd39f92_90477311',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
    
    <h2>Wyszukiwanie pracowników</h2>
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
listaPracownik" method="post">
        <div class="row uniform 50%">
            <div class="6u 12u">
                <input type="text" name="nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->nazwisko;?>
" placeholder=" Wpisz nazwisko pracownika" /><br />
            </div>
            <div class="12u">
                <ul class="actions">
                    <li><input type="submit" value="Szukaj" class="special small" /></li>
                    &nbsp;
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
dodajPracownik" class="button small">Dodaj nowego Pracownika</a></li> 
                </ul>
            </div>
        </div>
    </form>	

<?php }?>

<?php
}
}
/* {/block 'top'} */
/* {block 'content'} */
class Block_1224061059601c676cd41232_01012086 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1224061059601c676cd41232_01012086',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>

    <div id="p" name="p" class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>ID Pracownika</th>
                    <th>Nazwisko Pracownika</th>
                    <th>Imię Pracownika</th>
                    <th>Opcje</th>
                </tr>   
            </thead>

            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pracownik']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["ID_pracownika"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["nazwisko"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["imie"];?>
</td><td><ul class="actions small"><li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
edytujPracownik?id=<?php echo $_smarty_tpl->tpl_vars['p']->value['ID_pracownika'];?>
" class="button special small">Edytuj</a></li>&nbsp;<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
usunPracownik?id=<?php echo $_smarty_tpl->tpl_vars['p']->value['ID_pracownika'];?>
" class="button small">Usuń</a></li></ul></td></tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>           
        </table>
    </div>       

<?php }?>

<?php
}
}
/* {/block 'content'} */
}
