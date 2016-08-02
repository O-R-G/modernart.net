<?
$body = $item['body'];
if($body)
{
?><section id="contact"><?
    echo nl2br($body);

    // subscribe form
    $subscribe = $_POST['subscribe'];
    $message = $_POST['message'];
    if (!$subscribe) {
        ?><br /><br /><br />Mailing list<br />
        <form enctype='multipart/form-data' action='contact' method='post'>
        <textarea name='message' cols='30' rows='2'></textarea><br />
        <input name='subscribe' type='submit' value='Subscribe'>
        </form><?
    } else {
        $to = "reinfurt@o-r-g.com";
        $subject = "Mailing list subcription request";
        $body = "Please subscribe " . $message . ".";
        $headers = "From: subscribe@modernart.net";
        mail($to,$subject,$body,$headers);
        ?><br /><br /><br />Thanks.<?
    }
?></section><?
}
?>
