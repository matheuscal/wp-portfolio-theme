jQuery(function($) {
    let projectsContainer = $('#section2Container');
    
    // If the page was updated and the use is already scrolled to where the
    // second container should display, dont check for scrolling event and show it right away
    handleSection2Container(projectsContainer);
    $(window).scroll(function (event) {
        handleSection2Container(projectsContainer);
    })
    
    // Decide when the second section should appear and appends the necessary class for doing so
    function handleSection2Container(section2ContainerElem){
        let scroll = $(window).scrollTop();
        let section2ContainerOffset = section2ContainerElem.offset().top;
    
        // Make the next section from index page fade in from right after
        // a certain scroll threshold 
        if (scroll >= section2ContainerOffset - (section2ContainerOffset * 0.7))
            projectsContainer.addClass('show-from-right');
    }
});
