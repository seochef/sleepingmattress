{extends file='page.tpl'}
{block name='page_content'}
    <form id="survey_form" method="post">
        {foreach from=$questions item=question key=q}
            {assign var="last_selected" value=0}
            <label><h4>{$question}</h4></label><br>
            {foreach from=$answersutility[$q] key=ai item=answeritem}
                {if $last_selected == 0}
                    <input type=radio name=group_{$q} value={$ai} checked> {$answers[$answeritem]}<br>
                    {assign var="last_selected" value=1}                 
                {else}
                    <input type=radio name=group_{$q} value={$ai}> {$answers[$answeritem]}<br>
                {/if}
            {/foreach}
            <br>
        {/foreach}
        <input type="submit" name="invio"  id="invio" value="Invio" style="display: none">
        <button id="riepilogo">Riepilogo</button>
    </form>
{/block}