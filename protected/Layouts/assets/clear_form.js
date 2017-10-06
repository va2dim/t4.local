// TODO oFieldType можно сделать array
function clearForm(oForm, oFieldType) {

  var elements = oForm.elements;

  //oForm.reset();

  for(i=0; i<elements.length; i++) {

  	fieldType = elements[i].type.toLowerCase();

    if(oFieldType && fieldType != oFieldType && fieldType != "submit") {
    	continue;
	}

	if(fieldType == "number" && elements[i].value === "") {
        oFieldType = "";
	}

	switch(fieldType) {

		case "text":
		case "password":
		case "textarea":
	    case "hidden":
	    case "email":
		case "number":
			elements[i].value = "";
			break;

		case "radio":
		case "checkbox":
  			if (elements[i].checked) {
   				elements[i].checked = false;
			}
			break;

		case "select-one":
		case "select-multi":
			elements[i].selectedIndex = -1;
			break;

        case "submit":
            elements[i].innerHTML = 'Создать';
            //elements[i].className = 'btn btn-success'; не могу через изменить имя класса
            //elements[i].setAttribute('className', 'btn btn-alert');
            break;

        default:
			break;

		}

    }
}
