import $ from 'jquery';
class Search{
    // init objects
    constructor() {
        // leveraging jquery library
        console.log('search object init');
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("#search-term");

        this.events();
        this.isOverlayOpen = false;
        this.typingTimer;
        this.resultsDiv = $("#search-overlay__results");
    }

    //events
    events(){
        this.openButton.on("click", this.openOverlay.bind(this)); // .bind ensures that the function stays within this object's context, instead of making its own.
        this.closeButton.on("click", this.closeOverlay.bind(this));
        this.searchField.on("keydown", this.typingLogic.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
    }
    // typing logic
    typingLogic(){
        // alert('typing logic says hi :)'); // working
        // setTimeout(function () {
        //     console.log("timeout test")
        // }, 2000);
        clearTimeout(this.typingTimer);
        this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
    }
    getResults(){
        // send to wordpress server
        console.log("RESULTS");
        this.resultsDiv.html("Imagine search results here...");
    }
    // open overlay
    openOverlay(){
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll"); // prevent scrolling while searching
        this.isOverlayOpen = true;
    }
    // close overlay
    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll"); // restore scrolling ability when the search is closed3
        this.isOverlayOpen = false;
    }
    // key event methods
    keyPressDispatcher(e){
        console.log("this is a test")
        if(e.keyCode == 83 && !this.isOverlayOpen) this.openOverlay(); // open the search overlay if 's' is pressed
        if(e.keyCode == 27 && this.isOverlayOpen) this.closeOverlay(); // close the search overlay if 'esc' is pressed
    }
}
export default Search;