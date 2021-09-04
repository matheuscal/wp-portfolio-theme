$(document).ready(function() {

    $(window).scroll(function (event) {
        let scroll = $(window).scrollTop();
        let projectsContainer = $('#projectsContainer');
        let projectsContainerOffset = projectsContainer.offset().top;
        
        // Make the next section from index page fade in from right after
        // a certain scroll threshold 
        if (scroll >= projectsContainerOffset - projectsContainerOffset * 0.55) {
            projectsContainer.addClass('show-from-right');
        }
    })
});