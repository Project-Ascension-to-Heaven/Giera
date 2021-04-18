<table class="table table-bordered">
    {foreach from=$logArray item=logLine}
        <tr>
            <td>{$logLine.timestamp|date_format:$config.datetime}</td>
            <td>{$logLine.sender}</td>
            <td>{$logLine.message}</td>
            <td>{$logLine.type}</td>
        </tr>
    {/foreach}
    
    {*foreach ($gm->l->getLog() as $entry) {
            $timestamp = date('d.m.Y H:i:s', $entry['timestamp']);
            $sender = $entry['sender'];
            $message = $entry['message'];
            $type = $entry['type'];
            echo "<tr>";
            echo "<td>$timestamp</td>";
            echo "<td>$sender</td>";
            echo "<td>$message</td>";
            echo "<td>$type</td>";
            echo "</tr>";
        }*}
</table>