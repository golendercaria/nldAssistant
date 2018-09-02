import "../../css/src/app.scss";

import { pre } from "./utilities";


let $ = require("jquery");


const urlNldAssistant = "http://localhost/assistant.nld/nldAssistant.php";

$.ajax({
	url: urlNldAssistant,
	method: "POST",
	data: { for: "nldAssistant", action: "getHtaccess" },
}).done(function (data) { 
	console.log(data);
	data = JSON.parse(data)
	$(".htaccess").html(data);
	console.log(data);
	//$(".htaccess").html(data);
});