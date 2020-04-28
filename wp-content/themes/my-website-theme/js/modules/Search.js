import $ from 'jquery';
class Search{
    // init objects
    constructor() {
        // leveraging jquery library
        console.log('search object init');
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.events();
    }

    //events
    events(){
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
    }
    // open overlay
    openOverlay(){
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll"); // prevent scrolling while searching
    }
    // close overlay
    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll"); // restore scrolling ability when the search is closed
    }
    // key event methods
    keyPressDispatcher(e){
        console.log("this is a test")
        if(e.keyCode == 83) this.openOverlay();
    }
}
export default Search;