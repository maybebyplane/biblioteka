{extends file="main.tpl"}


{block name=top}
    
{if count($conf->roles)>0}
    
    <h2>Wyszukiwanie czytelników</h2>
    <form action="{$conf->action_url}listaWybierz" method="post">
        <div class="row uniform 50%">
            <div class="6u 12u">
                <input type="text" name="nazwisko" value="{$searchForm->nazwisko}" placeholder=" Wpisz nazwisko czytelnika" /><br />
            </div>
            <div class="12u">
                <ul class="actions">
                    <li><input type="submit" value="Szukaj" class="special small" /></li>
                </ul>
            </div>
        </div>  
    </form>	

{/if}

{/block}


{block name=content}
    
{if count($conf->roles)>0}
    
    <div id="c" name="c" class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>ID Czytelnika</th>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>PESEL</th>
                    <th>ID Wypozyczenia</th>
                    <th>Opcje</th>
                </tr>   
            </thead>

            <tbody>
                {foreach $czytelnik as $c}
                    {strip}
                        <tr>
                            <td>{$c["ID_czytelnika"]}</td>
                            <td>{$c["nazwisko"]}</td>
                            <td>{$c["imie"]}</td>
                            <td>{$c["pesel"]}</td>
                            <td>{$c["ID_wypozyczenia"]}</td>
                            <td>
                                <ul class="actions small">
                                    <li><a href="{$conf->action_url}listaWypozyczen?id_czytelnika={$c['ID_czytelnika']}" class="button small">WYBIERZ</a></li>
                                </ul>               
                            </td>
                        </tr>
                    {/strip}
                {/foreach}
            </tbody>           
        </table>
    </div> 
                
{/if}

{/block}