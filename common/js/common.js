function hit(frm){
	frm.mode.value = 1;
	frm.submit();
	return true;
}
function out(frm){
	frm.mode.value = 2;
	frm.submit();
	return true;
}
function change(frm){
	frm.mode.value = 3;
	frm.submit();
	return true;
}
function logout(frm){
	frm.mode.value = 4;
	frm.submit();
	return true;
}