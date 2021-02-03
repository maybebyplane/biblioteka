<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<title>Witajcie w świecie książek!</title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" /> 
</head>

<body class="landing">
    
    <header id="header" class="alt">
        {if count($conf->roles)>0}
        <h1>Witaj w panelu zarządzania</h1>
        {/if}
        <nav id="nav">
            <ul>
		<li><a href="{$conf->app_root}">Strona główna</a></li>
                {if count($conf->roles)>0}
                    <li><a href="{$conf->action_root}listaCzytelnik">Czytelnicy</a></li>
                    <li><a href="{$conf->action_root}listaPracownik">Pracownicy</a></li>
                    <li><a href="{$conf->action_root}#ksiazki">Książki</a></li>
                    <li><a href="{$conf->action_root}logout">Wyloguj</a></li>
                {else}	
                    <li><a href="{$conf->action_root}loginShow">Zaloguj</a></li>
                {/if}
                
            </ul>
	</nav>
    </header>
    
    <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
                
    {block name=logowanie} {/block}
    
    <section id="banner" class="hidden">
	<h2>Dzień dobry!</h2>
            <p>Przenieś się razem z nami <br /> w bezkresny świat książek.</p>
            {if !count($conf->roles)>0}
            <ul class="actions">
                <li><a href="#ksiazki" class="button special icon fa-arrow-down">Zaczynamy</a></li>
            </ul>
            {/if}
    </section>
    
    <div id="ksiazki">
    {block name=top} {/block}
    </div> 
    {block name=content} {/block}
    
    
    {block name=edycja} {/block}
    
        
    {block name=messages}  
        {if $msgs->isMessage()}
            <div class="messages bottom-margin">
                <ul>
                    {foreach $msgs->getMessages() as $msg}
                    {strip}
                    <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                    {/strip}
                    {/foreach}
                </ul>
            </div>
        {/if}
    {/block}


    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <ul class="copyright">
                <li>&copy; Untitled</li>
                <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
                <li>Images: <a href="http://www.canva.com">Canva</a></li>
                <li>Made by: Dominika Pałyz</li>
                <li><a href="{$conf->action_root}start">Strona główna</a></li>
            </ul>
        </div>
    </footer>

        
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>   

</body>

</html>