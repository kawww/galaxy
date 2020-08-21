<?php

$themes = buildThemes();

$checktheme=$_REQUEST["theme"];

if(!$checktheme){$checktheme="social-network";}

echo "<script>function submitForm(){var form = document.getElementById(\"myform\");form.submit();}</script>";

echo "<form action=\"\" method=\"get\" id=\"myform\"><select name=\"theme\" onchange=\"submitForm();\">";

foreach($themes as $t){

if($t["dirname"]==$checktheme){$val=" selected=\"selected\"";}else{$val="";}

echo "<option value=\"".$t["dirname"]."\"".$val.">".$t["dirname"]."</option>";

}

echo "</select>";

echo "<input type=\"hidden\" name=\"asset\" value=\"".$_REQUEST["asset"]."\">";
echo "<input type=\"hidden\" name=\"group\" value=\"".$_REQUEST["group"]."\">";
echo "<input type=\"hidden\" name=\"gname\" value=\"".$_REQUEST["gname"]."\">";
echo "<input type=\"hidden\" name=\"txid\" value=\"".$_REQUEST["txid"]."\">";

echo "</form>";

?>
