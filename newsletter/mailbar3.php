<?php include("globals.php"); ?>
<form action="<?php echo $website.$relative_string;?>" name="subscribe" method="post">
<fieldset><legend>newsletter</legend>
<label for="email2">Your email address</label>
<input name="email" type="text" class="box" id="email2" value="" size="20" /><br />
<select name="subscribe" id="subscribe">
<option value="true" selected="selected">Subscribe</option>
<option value="false">Un-Subscribe</option>
</select>
<input name="Submit2" type="submit" class="box" value="Submit" />
</fieldset>
</form>
