function showHide(x) {
    var component = document.getElementById(x);
    component.classList.toggle("hidden");
}

function vSidebarItem(x) {
    var sidebar = document.querySelectorAll(`[id^="sidebar"]`);
    var label = document.querySelectorAll(`[id^="label-"]`)

    for (var i = 0; i < sidebar.length; i++) {
        if (sidebar[i].id == x) {
            sidebar[i].classList.toggle("hidden")
        } else if (!sidebar[i].classList.contains('hidden')) {
            sidebar[i].classList.toggle("hidden");

            label[i].setAttribute("checked", ""); // For IE
            label[i].removeAttribute("checked"); // For other browsers
            label[i].checked = false;
        }
    }
}