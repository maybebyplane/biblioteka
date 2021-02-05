{extends file="main.tpl"}


{block name=top}
    
{if count($conf->roles)>0}
    
    <h2>Wyszukiwanie czytelników</h2>
    <form action="{$conf->action_url}listaCzytelnik" method="post">
        <div class="row uniform 50%">
            <div class="6u 12u">
                <input type="text" name="nazwisko" value="{$searchForm->nazwisko}" placeholder=" Wpisz nazwisko czytelnika" /><br />
            </div>
            <div class="12u">
                <ul class="actions">
                    <li><input type="submit" value="Szukaj" class="special small" /></li>
                    &nbsp;
                    <li><a href="{$conf->action_url}dodajCzytelnik" class="button small">Dodaj nowego Czytelnika</a></li> 
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
                    <th>Opcje</th>
                    <th>Wypożyczenie [nr ID]</th> 
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
                            <td>
                                <ul class="actions small">
                                    <li><a href="{$conf->action_url}edytujCzytelnik?id_czytelnika={$c["ID_czytelnika"]}" class="button special small">Edytuj</a></li>
                                    &nbsp;
                                    <li><a href="{$conf->action_url}usunCzytelnik?id_czytelnika={$c["ID_czytelnika"]}" class="button small">Usuń</a></li>
                                </ul>               
                            </td>
                            <td>
                                [{$c["ID_wypozyczenia"]}]
                                {if !($c["ID_wypozyczenia"] == '')}
                                    <ul class="actions small">
                                        <li><a href="{$conf->action_root}listaWypozyczen?id_czytelnika={$c["ID_czytelnika"]}" class="button alt small">Pokaż</a></li>
                                    </ul>
                                {/if} 
                                &nbsp;
                                {if (!({$id_ksiazki} == '')) && ({$c["ID_wypozyczenia"]} == '')}
                                    <ul class="actions small">
                                        <li><a href="{$conf->action_root}wypozyczKsiazka?id_czytelnika={$c["ID_czytelnika"]}&id_ksiazki={$id_ksiazki}" class="button alt small">Wybierz</a></li>
                                    </ul>
                                {/if}
                            </td>
                        </tr>
                    {/strip}
                {/foreach}
            </tbody>           
        </table>
    </div> 
                
{/if}

{/block}