var indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
var loginInxDB = null;

function startDB() {
	loginInxDB = indexedDB.open("logindb1", 1);
	loginInxDB.onupgradeneeded = function (e) {
		var active = loginInxDB.result;
		var object_a = active.createObjectStore("login", {keyPath: 'id', autoIncrement: true});
			object_a.createIndex('by_iden', 'iden', {unique: true});
	};
	loginInxDB.onsuccess = function (e) {
		loadCredentials();
	};
	loginInxDB.onerror = function (e) {
		showAlert('Error al cargar IndexedDB');
	};
}
function loadCredentials(){
	var active = loginInxDB.result;
	var data = active.transaction(["login"], "readwrite");
	var object = data.objectStore("login");
	
	var index = object.index("by_iden");
	var request = index.get(1);

	request.onsuccess = function () {
		var result = request.result;
		if (result !== undefined) {
			$("#usuario").val(result.usuario);
			$("#password").val(result.pswd);
		}else{
			$("#usuario").val('');
			$("#password").val('');
		}
	};
}
function storeCredentials(){
	var active = loginInxDB.result;
	var data = active.transaction(["login"], "readwrite");
	var object = data.objectStore("login");
	var objectStoreRequest = object.clear();
	
	var request = object.put({
		iden:		1,
		usuario:	$("#usuario").val(),
		pswd:		$("#password").val()
	});
}
function deleteCredentials(){
	var active = loginInxDB.result;
	var data = active.transaction(["login"], "readwrite");
	var object = data.objectStore("login");
	var objectStoreRequest = object.clear();
}
startDB();