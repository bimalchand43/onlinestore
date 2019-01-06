<?php
$first_bit = $this->uri->segment(1);
$third_bit = $this->uri->segment(3);

if($third_bit != ""){
	//we have three segments on the url, so...
	$start_of_target_url = "../../"; 
}else{
	//we probably have two segments on the url, so...
	$start_of_target_url = "../";
}
?>
<script type="text/javascript" src="<?= site_url('assets/jquery/jquery.min.1_12_4.js'); ?>"></script>
<script type="text/javascript" src="<?= site_url('assets/jquery/jquery-ui.min.js'); ?>"></script>
<script>
jQuery(document).ready(function($){
	$("#sortlist").sortable({
		stop: function(event, ul) { saveChanges(); }
	});
	$("#sortlist").disableSelection();

});

function saveChanges(){
	var num = jQuery("#sortlist > li").length;
	dataString = "number=" +num;
	for(x=1; x<=num; x++){
		var catid = $('#sortlist li:nth-child('+x+')').attr('id');
		dataString = dataString + "&order"+x+"="+catid;
	}
	//console.log(dataString);
	$.ajax({
		type: "POST",
		url: "<?php echo $start_of_target_url.$first_bit; ?>/sort",
		data: dataString
	});
	return false;
}
</script>