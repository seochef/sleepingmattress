{extends file='page.tpl'}
{block name='page_content'}
    <form method="post">
        {foreach from=$questions item=question key=q}
            <label>{$question}</label><br>
            {foreach from=$answersutility[$q] key=ai item=answeritem}
                <input type=radio value={$ai}>{$answers[$answeritem]}<br>
            {/foreach}
            <br>
        {/foreach}
        <input type="submit" name="invio" value="Invio">
    </form>
{/block}