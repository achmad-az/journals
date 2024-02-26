// DO NOT REMOVE - NEED FOR HOT FIX
if (module.hot) {
	module.hot.accept();
}
// DO NOT REMOVE - NEED FOR HOT FIX
// ADD YOUR CODE BELOW

import jQuery from "jquery";
import "jquery-ui/themes/base/core.css";
//import "jquery-ui/themes/base/theme.css";
import "jquery-ui/themes/base/datepicker.css";
import "jquery-ui/ui/core";
import "jquery-ui/ui/effect";
import "jquery-ui/ui/widgets/datepicker";
import "dateformat";
import "aos/dist/aos.css";
import Rellax from "rellax";

//home
var rellax = document.querySelector(".rellax");
if (rellax) {
	var rellax = new Rellax(".rellax");
}
