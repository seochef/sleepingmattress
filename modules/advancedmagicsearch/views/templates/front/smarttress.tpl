{extends file='page.tpl'}
{block name='page_content'}
    <form method="post">
        {foreach from=$questions item = question key = q}
            <label>{$question}</label><br>
            <select required>
            </select><br>
        {/foreach}
        <input type="submit" name="invio" value="Invio">
    </form>
{/block}