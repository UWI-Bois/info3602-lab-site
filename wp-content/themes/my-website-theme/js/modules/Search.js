import $ from 'jquery';
class Search{
    // init objects
    constructor() {
        // leveraging jquery library
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".js-search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.events();
    }

    //events
    events(){
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
    }
    // open overlay
    openOverlay(){
        this.searchOverlay.addClass("search-overlay--active");
    }
    // close overlay
    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
    }
}
export default Search;