{if isset($result_form)}
    {if $result_form}
    <div>
        <p>Configurazione aggiornata correttamente</p>
    </div>  
    {else}
    <div>
        <p>Configurazione non aggiornata</p>
    </div>    
    {/if} 
{/if}

<form action = "{$adminlink}" method = post>
    <label for = "risposte"> Risposta </label>
    <select id="risposte" name = "risposte" required>
        {foreach from = $answers item = answer key = i}
        <option value = {$i}> {$answer} </option>
        {/foreach}
    </select>

    <label for="tipo">Tipo</label>
    <select id="tipo" name = "tipo" required  >
        <option value = "attribute"> attribute </option>
        <option value = "feature"> feature </option>
        <option value = "price"> price </option>
    </select>

    <label for = "id_primario">ID Primario</label>
    <input id="id_primario" type = "text" required name = "id_primario" pattern = "[0-9]+"/>

    <label for = "id_valore">ID Valore</label>
    <input id="id_valore" type = "text" required name = "id_valore" pattern = "[0-9]+"/>

    <input type = "submit" name = "submitAnswers" value = "Invio" />
</form>