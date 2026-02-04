<?php
//https://www.php.net/manual/en/function.array.php
$corner_items = array();
array_push($corner_items,"cheese", "soccerball", "wombat", "sandwich");
$corner_item = $_POST["corner_item"];
$user_name = $_POST["user_name"];
echo("$user_name is the users name");
$months_arr = array(
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October"
);
$month = $_POST["month"];
echo("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Mad Lib</title>
    <link rel=\"stylesheet\" href=\"./css/reset.css\">
    <link rel=\"stylesheet\" href=\"./css/main.css\">
    <script src=\"./js/script.js\" defer></script>
</head>
<body>");

echo("
<form action=\"./index.php\" method=\"post\">
    <formset>
        <label for=\"user_name\">Recipient Name:</label>
        <input type=\"text\" value=\"$user_name\" id=\"user_name\" name=\"user_name\" required minlength=\"2\" maxlength=\"10\" size=\"10\" />
    </formset>
    <label for=\"month\">Month:</label>
    <select name=\"month\" id=\"month\">");
    /**if($_POST["user_name"]){
        echo($_POST["user_name"]);
    }else{
        echo("We do not have a user name");
    }*/
foreach ($months_arr as $key=>$value) {
    if ($key == $month) {
        $selected = " selected=\"selected\"";
    } else {
        $selected = "";
    }
    echo("<option value=\"$key\"$selected>$value</option>");
}
echo("</select>
    <fieldset>
"); 

foreach ($corner_items as $key=>$value) {
    if ($key == $corner_item) {
        $check = " checked=\"checked\"";
    } else {
        $check = "";
    }
    
    echo("<input type=\"radio\" name=\"corner_item\" id=\"$value\" value=\"$key\"$check>
    <label for=\"$value\">$value</label>");
}
echo("
    </fieldset>
    <input type=\"submit\" name=\"submit\" id=\"submit\" class=\"submit\" value=\"Update\">
</form>
");
if($month && $corner_item && $user_name){
echo("Thats right $user_name!  $months_arr[$month] is national $corner_items[$corner_item] month!");
};
echo("
</body>
</html>");
?>