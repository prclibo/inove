<?php $options = get_option('inove_options'); ?>

<div id="searchbox">
	<?php if($options['google_cse'] && $options['google_cse_cx']) : ?>
		<form action="http://www.google.com/cse" method="get">
			<div class="content">
				<input id="searchtxt" type="text" class="textfield" name="q" size="24" />
				<input id="searchbtn" type="submit" class="button" name="sa" value="" />
				<input type="hidden" name="cx" value="<?php echo $options['google_cse_cx']; ?>" />
				<input type="hidden" name="ie" value="UTF-8" />
			</div>
		</form>
	<?php else : ?>
		<form action="<?php bloginfo('home'); ?>" method="get">
			<div class="content">
				<input id="searchtxt" type="text" class="textfield" name="s" size="24" value="<?php echo get_search_query(); ?>" />
				<input id="searchbtn" type="submit" class="button" value="" />
			</div>
		</form>
	<?php endif; ?>
</div>
<script type="text/javascript">
//<![CDATA[
	var searchbox = document.getElementById("searchbox");
	var searchtxt = document.getElementById("searchtxt");
	var searchbtn = document.getElementById("searchbtn");
	var tiptext = "<?php _e('Type text to search here...', 'inove'); ?>";
	if(searchtxt.value == "" || searchtxt.value == tiptext) {
		searchtxt.className += " searchtip";
		searchtxt.value = tiptext;
	}
	searchtxt.onfocus = function(e) {
		if(searchtxt.value == tiptext) {
			searchtxt.value = "";
			searchtxt.className = searchtxt.className.replace(" searchtip", "");
		}
	}
	searchtxt.onblur = function(e) {
		if(searchtxt.value == "") {
			searchtxt.className += " searchtip";
			searchtxt.value = tiptext;
		}
	}
	searchbtn.onclick = function(e) {
		if(searchtxt.value == "" || searchtxt.value == tiptext) {
			return false;
		}
	}
//]]>
</script>