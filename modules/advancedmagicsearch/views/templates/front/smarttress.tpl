{extends file='page.tpl'}
{block name='page_content'}
    <form id="survey_form" method="post">
        {foreach from=$questions item=question key=q}
            {assign var="last_selected" value=0}
            <h4 id="domanda_{$q}">{$question}</h4><br>
            {foreach from=$answersutility[$q] key=ai item=answeritem}
                {if $last_selected == 0}
                    <div>
                        <input type=radio name=group_{$q} value={$ai} checked data_label_id="risposta_{$q}_{$ai}" data_label_question_id="domanda_{$q}">
                        <label id="risposta_{$q}_{$ai}">
                            {$answers[$answeritem]}
                        </label>
                    </div>
                    {assign var="last_selected" value=1}                 
                {else}
                    <div>
                        <input type=radio name=group_{$q} value={$ai} data_label_id="risposta_{$q}_{$ai}" data_label_question_id="domanda_{$q}"> 
                        <label id="risposta_{$q}_{$ai}">
                            {$answers[$answeritem]}
                        </label>
                    </div>
                {/if}
            {/foreach}
            <br>
        {/foreach}
        <div id="resume_container"></div>
        <div>
        <input type="submit" name="invio"  id="invio" value="Invio" style="display: none">
        <button id="riepilogo">Riepilogo</button>
        <button id="indietro" style="display: none">Indietro</button>
        </div>
    </form>
{/block}