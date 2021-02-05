{extends file="main.tpl"}

{block name=top}
    
{if count($conf->roles)>0}
    
    <h2>Historia wypożyczeń</h2>
    <form action="{$conf->action_url}listaWypozyczen" method="post">
        <div class="row uniform 50%">
            <div class="6u 12u">
                <input type="text" name="id_ksiazki" value="{$searchForm->id_ksiazki}" placeholder=" Wpisz ID książki, której szukasz:" /><br />
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
    
    <div id="w" name='w' class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data wypożyczenia</th>
                    <th>Data zwrotu</th>
                    <th>ID Książki</th>
                    <th>ID Czytelnika</th>
                    <th>ID Pracownika</th>
                    <th>Opcje</th>
                </tr>   
            </thead>

            <tbody>
                {foreach $wypozyczenie as $w}
                    {strip}
                        <tr>
                            <td>{$w["ID_wypozyczenia"]}</td>
                            <td>{$w["data_wypozyczenia"]}</td>
                            <td>{$w["data_oddania"]}</td>
                            <td>{$w["ID_ksiazki"]}</td>
                            <td>{$w["ID_czytelnika"]}</td>
                            <td>{$w["ID_pracownika"]}</td>
                            <td>
                                {if !($w["ID_wypozyczenia"] == '')}
                                    <ul class="actions small">
                                        <li><a href="{$conf->action_root}zwrocKsiazka?id_wypozyczenia={$w["ID_wypozyczenia"]}" class="button alt small">ZWRÓĆ</a></li>
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