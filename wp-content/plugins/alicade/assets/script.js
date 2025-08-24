window.addEventListener("load", function() {
    let tabs = document.querySelectorAll(".nav-tabs li");
    let contents = document.querySelectorAll(".tab-content > div");

    tabs.forEach((tab, index) => {
        tab.addEventListener("click", function() {
            tabs.forEach(t => t.classList.remove("active"));
            contents.forEach(c => c.style.display = "none");

            tab.classList.add("active");
            contents[index].style.display = "block";
        });
    });

    // Show the first tab by default
    if (tabs.length > 0) {
        tabs[0].classList.add("active");
        contents[0].style.display = "block";
    }
}); 