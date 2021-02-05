<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-05 00:31:20
  from 'C:\XAMPP\htdocs\biblioteka\app\views\wybierz.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601c83c81d7e45_75816295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8385f574e623b234a02bc2e2e14177aa36969f7d' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\wybierz.tpl',
      1 => 1612481396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601c83c81d7e45_75816295 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1921072850601c83c81c8707_85908660', 'top');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1688389909601c83c81cffd8_92490908', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_1921072850601c83c81c8707_85908660 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1921072850601c83c81c8707_85908660',
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
class Block_1688389909601c83c81cffd8_92490908 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1688389909601c83c81cffd8_92490908',
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
                    <th>ID_wypozyczenia</th>
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
wypozyczenie?id_czytelnika=<?php echo $_smarty_tpl->tpl_vars['c']->value['ID_czytelnika'];?>
" class="button small">WYBIERZ</a></li></ul></td></tr>
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
