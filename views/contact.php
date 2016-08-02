<?
$body = $item['body'];
if($body)
{
?><section id="contact"><?
    echo nl2br($body);

    $subscribe = $_POST['subscribe'];
    $message = $_POST['message'];
    if (!$subscribe) {
        ?><br /><br />Mailing list<br />
        <form enctype='multipart/form-data' action='contact' method='post'>
        <textarea name='message' cols='30' rows='2'></textarea><br />
        <input name='subscribe' type='submit' value='Subscribe'>
        </form><?
    } else {
        mail("reinfurt@o-r-g.com", "Mailing list subcription request", "Please subscribe " . $message . ".");
        ?><br /><br />Thanks.<?
    }
?></section><?
}
?>
