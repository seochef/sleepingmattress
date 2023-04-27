{extends file='page.tpl'}
{block name='page_content'}
    <form id="survey_form" action="{$modulelink}" method="post">
        <div id="input-container">
            {foreach from=$questions item=question key=q}
                {assign var="last_selected" value=0}
                <h4 id="domanda_{$q}">{$question}</h4><br>
                {foreach from=$answersutility[$q] key=ai item=answeritem}
                    {if $last_selected == 0}
                        <div>
                            <input type=radio name=group_{$q} class="checkclass" value={$answeritem} checked data_label_id="risposta_{$q}_{$answeritem}" data_label_question_id="domanda_{$q}">
                            <label id="risposta_{$q}_{$answeritem}">
                                {$answers[$answeritem]}
                            </label>
                        </div>
                        {assign var="last_selected" value=1}                 
                    {else}
                        <div>
                            <input type=radio name=group_{$q} class="checkclass" value={$answeritem} data_label_id="risposta_{$q}_{$answeritem}" data_label_question_id="domanda_{$q}"> 
                            <label id="risposta_{$q}_{$answeritem}">
                                {$answers[$answeritem]}
                            </label>
                        </div>
                    {/if}
                {/foreach}
                <br>
            {/foreach}
        </div>
        <div id="resume_container"></div>
        <div class="invio">
        <input type="submit" name="invio"  id="invio" value="Invio" class="pulsante" style="display: none;  ">
        <button id="riepilogo" class="pulsante">Riepilogo</button>
        <button id="indietro" class="pulsanteIndietro">Indietro</button>
        </div>
    </form>
{/block}