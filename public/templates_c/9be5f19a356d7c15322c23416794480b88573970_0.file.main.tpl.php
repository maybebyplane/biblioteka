<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-03 19:59:31
  from 'C:\XAMPP\htdocs\biblioteka\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601af293cbde70_09609876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9be5f19a356d7c15322c23416794480b88573970' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\templates\\main.tpl',
      1 => 1612378769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601af293cbde70_09609876 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<title>Witajcie w świecie książek!</title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" /> 
</head>

<body class="landing">
    
    <header id="header" class="alt">
        <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
        <h1>Witaj w panelu zarządzania</h1>
        <?php }?>
        <nav id="nav">
            <ul>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
">Strona główna</a></li>
                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
listaCzytelnik">Czytelnicy</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
listaPracownik">Pracownicy</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
#ksiazki">Książki</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a></li>
                <?php } else { ?>	
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow">Zaloguj</a></li>
                <?php }?>
                
            </ul>
	</nav>
    </header>
    
    <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
                
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2071246612601af293cb1ea6_13534201', 'logowanie');
?>

    
    <section id="banner" class="hidden">
	<h2>Dzień dobry!</h2>
            <p>Przenieś się razem z nami <br /> w bezkresny świat książek.</p>
            <?php if (!count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
            <ul class="actions">
                <li><a href="#ksiazki" class="button special icon fa-arrow-down">Zaczynamy</a></li>
            </ul>
            <?php }?>
    </section>
    
    <div id="ksiazki">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_922440020601af293cb3c51_55864506', 'top');
?>

    </div> 
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_713520921601af293cb4a64_17352889', 'content');
?>

    
    
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2115455023601af293cb5285_94232552', 'edycja');
?>

    
        
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_766637379601af293cb59f7_72221439', 'messages');
?>



    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <ul class="copyright">
                <li>&copy; Untitled</li>
                <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
                <li>Images: <a href="http://www.canva.com">Canva</a></li>
                <li>Made by: Dominika Pałyz</li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
start">Strona główna</a></li>
            </ul>
        </div>
    </footer>

        
    <!-- Scripts -->
    <?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/skel.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>   

</body>

</html><?php }
/* {block 'logowanie'} */
class Block_2071246612601af293cb1ea6_13534201 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'logowanie' => 
  array (
    0 => 'Block_2071246612601af293cb1ea6_13534201',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'logowanie'} */
/* {block 'top'} */
class Block_922440020601af293cb3c51_55864506 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_922440020601af293cb3c51_55864506',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'top'} */
/* {block 'content'} */
class Block_713520921601af293cb4a64_17352889 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_713520921601af293cb4a64_17352889',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'content'} */
/* {block 'edycja'} */
class Block_2115455023601af293cb5285_94232552 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'edycja' => 
  array (
    0 => 'Block_2115455023601af293cb5285_94232552',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'edycja'} */
/* {block 'messages'} */
class Block_766637379601af293cb59f7_72221439 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'messages' => 
  array (
    0 => 'Block_766637379601af293cb59f7_72221439',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
            <div class="messages bottom-margin">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                    <li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        <?php }?>
    <?php
}
}
/* {/block 'messages'} */
}
