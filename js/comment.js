/*
Author: mg12
Update: 2010/06/27
Author URI: http://www.neoease.com/
*/
(function() {

function reply(authorId, commentId, commentBox) {
	var author = document.getElementById(authorId).innerHTML;
	var insertStr = '<a href="#' + commentId + '">@' + author.replace(/\t|\n|\r\n/g, "") + ' </a> \n';

	appendReply(insertStr, commentBox);
}

function quote(authorId, commentId, commentBodyId, commentBox) {
	var author = document.getElementById(authorId).innerHTML;
	var comment = document.getElementById(commentBodyId).innerHTML;

	var insertStr = '<blockquote cite="#' + commentBodyId + '">';
	insertStr += '\n<strong><a href="#' + commentId + '">' + author.replace(/\t|\n|\r\n/g, "") + '</a> :</strong>';
	insertStr += comment.replace(/\t/g, "");
	insertStr += '</blockquote>\n';

	insertQuote(insertStr, commentBox);
}

function appendReply(insertStr, commentBox) {
	if(document.getElementById(commentBox) && document.getElementById(commentBox).type == 'textarea') {
		field = document.getElementById(commentBox);

	} else {
		alert("The comment box does not exist!");
		return false;
	}

	if (field.value.indexOf(insertStr) > -1) {
		alert("You've already appended this reply!");
		return false;
	}

	if (field.value.replace(/\s|\t|\n/g, "") == '') {
		field.value = insertStr;
	} else {
		field.value = field.value.replace(/[\n]*$/g, "") + '\n\n' + insertStr;
	}

	field.focus();
}

function insertQuote(insertStr, commentBox) {
	if(document.getElementById(commentBox) && document.getElementById(commentBox).type == 'textarea') {
		field = document.getElementById(commentBox);

	} else {
		alert("The comment box does not exist!");
		return false;
	}

	if(document.selection) {
		field.focus();
		sel = document.selection.createRange();
		sel.text = insertStr;
		field.focus();

	} else if (field.selectionStart || field.selectionStart == '0') {
		var startPos = field.selectionStart;
		var endPos = field.selectionEnd;
		var cursorPos = startPos;
		field.value = field.value.substring(0, startPos)
					+ insertStr
					+ field.value.substring(endPos, field.value.length);
		cursorPos += insertStr.length;
		field.focus();
		field.selectionStart = cursorPos;
		field.selectionEnd = cursorPos;

	} else {
		field.value += insertStr;
		field.focus();
	}
}

function switchTab(showPanels, hidePanels, activeTab, activeClass, fadeTab, fadeClass) {
	document.getElementById(activeTab).className = activeClass;
	document.getElementById(fadeTab).className = fadeClass;

	var panel, panelList;
	panelList = showPanels.split(',');
	for (var i = 0; i < panelList.length; i++) {
		var panel = panelList[i];
		if (document.getElementById(panel)) {
			MGJS.setStyleDisplay(panel, 'block');
		}
	}
	panelList = hidePanels.split(',');
	for (var i = 0; i < panelList.length; i++) {
		panel = panelList[i];
		if (document.getElementById(panel)) {
			MGJS.setStyleDisplay(panel, 'none');
		}
	}
}

function loadCommentShortcut(frm, submitbnt, desc) {
	document.getElementById(frm).onkeydown = function (moz_ev) {
		var ev = null;
		ev = window.event ? window.event : moz_ev;
		if (ev != null && ev.ctrlKey && ev.keyCode == 13) {
			document.getElementById(submitbnt).click();
		}
	};
	document.getElementById(submitbnt).value += desc;
}

window['CMT'] = {};
window['CMT']['reply'] = reply;
window['CMT']['quote'] = quote;
window['CMT']['switchTab'] = switchTab;
window['CMT']['loadCommentShortcut'] = loadCommentShortcut;

})();