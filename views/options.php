<?
if ($_POST['action'] != "update")
{
?><form id="settings" action="/options" method="post" onsubmit="store_cookies();">
    <ul>
        <li>Typeface: </li>
        <li><input type="radio" name="font" value="bg">Bell Gothic</li>
        <li><input type="radio" name="font" value="hnr-medium">Helvetica Neue</li>
        <li><input type="radio" name="font" value="sf-text">San Francisco</li>
        <li><input type="radio" name="font" value="sf-display">San Francisco (Display)</li>
        <li><input type="radio" name="font" value="sfc-text">San Francisco Compact</li>
        <li><input type="radio" name="font" value="sfc-display">San Francisco Compact (Display)</li>
    </ul>
    <input type='hidden' name='action' value='update'>	
    <input type="submit" name="submit" value="Update">
</form><?
}
else
{
?>
<section id="settings">
    <p>Thank you. Your changes have been recorded.</p>
    <p><a href="/main">Main Menu</a></p>
</section><?
}
?>
<script>
    function store_cookies()
    {
        var font, style;
        var form = document.getElementById("settings");
        font = form.elements.namedItem("font").value;
        if (font)
            set_cookie("font", font);
    }
    
    function set_cookie(cname, cvalue)
    {
        document.cookie = cname + "=" + cvalue;
    }
</script>