$(document).ready(function() {
    var slideShowEls = $(".slide");

    /***
     * this function will create all the slideshow
     *  functionality, given a div with a collection
     *  of image elements.
     ***/
    var createSlideShow = function createSlideShow(elements) {
        // first, we want to initialize the slideshow.
        //  this will mean moving the images into a container,
        //  and adding a div containing the slideshow controls.
        $(elements).each(function() {
            // Gather all images in this div.
            var slideEls = $(this).children("img");

            // create two divs: one for controls and one for slides.
            // The controls div will contain a prev and next button.
            var slideControls = $("<div>").addClass("slideShowControls");
            var prevBtn = $("<button>")
                .addClass("prevBtn")
                .text("Prev");
            var nextBtn = $("<button>")
                .addClass("nextBtn")
                .text("Next");
            slideControls.append(prevBtn, [nextBtn]);

            // The slides div will be the new home of the
            //    slide els from above.
            var slideContents = $("<div>").addClass("slideContents");
            slideEls.detach();
            slideContents.append(slideEls);
            slideEls.hide();
            slideEls.first().show();

            // both newly created divs are placed in the slideshow container.
            $(this).append(slideControls, [slideContents]);

        }) // End .each(), the initialization routine.

        // Now, we need to create the listeners for the
        //   next and prev clicks.
        $(".nextBtn").on("click", function() {
            // We need to get the slides container...
            var slidePane = $(this).parent().siblings(".slideContents");
            //  ... hide the visible slide and show the next one.
            slidePane.find("img:visible").hide()
                .next().show();

            // If no slide is currently showing, there WAS no next one.
            //  Redisplay the first one.
            if (!slidePane.find("img").is(":visible"))
                slidePane.children("img").first().show();
        });

        $(".prevBtn").on("click", function() {
            // We need to get the slides container...
            var slidePane = $(this).parent().siblings(".slideContents");

            //  ... hide the visible slide and show the previous one.
            slidePane.find("img:visible").hide()
                .prev().show();

            // If no slide is currently showing, there WAS no prev one.
            //  Redisplay the last one.
            if (!slidePane.find("img").is(":visible"))
                slidePane.children("img").last().show();
        });

    }

    // Run the initialize routine for all slideshow divs.
    //  This will create the slideshow structure and implement and
    //  handle event listeners.
    createSlideShow(slideShowEls);

});