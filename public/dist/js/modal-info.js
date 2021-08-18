(function(cash) {
    "use strict";

    // Show modal
    if (cash("#modalInfo").length != 0) {
        cash("#modalInfo").modal("show");
    } else {
        cash("body").removeClass('overflow-y-hidden');
    }
    console.log(cash("body"));
    console.log(cash("#modalInfo").length);

})(cash);