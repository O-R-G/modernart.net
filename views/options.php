<?
if ($_POST['action'] != "update")
{
?><form id="settings" action="/options" method="post" onsubmit="store_cookies();">
    <ul>
        <li>Typeface: </li>
        <li><input type="radio" name="font" value="bg">Bell Gothic</li>
        <li><input type="radio" name="font" value="hnr">Helvetica Neue</li>
    </ul>
    <ul>
        <li>Colouring: </li>
        <li><input type="radio" name="style" value="mid">A. Mid-Cream</li>
        <li><input type="radio" name="style" value="bw">B. Black and White</li>
        <li><input type="radio" name="style" value="light">C. Light Cream</li>
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
        style = form.elements.namedItem("style").value;
        if (font)
            set_cookie("font", font);
        
        if (style)
            set_cookie("style", style);
    }
    
    function set_cookie(cname, cvalue)
    {
        document.cookie = cname + "=" + cvalue;
    }
</script>