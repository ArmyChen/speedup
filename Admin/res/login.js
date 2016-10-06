function change_code() {
	$("#code").attr("src", 'verify.php?'+Math.random());
	return false;
}