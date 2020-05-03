import $ from 'jquery';
class Search{
    // init objects
    constructor() {
        // leveraging jquery library
        console.log('search object init');
        // ajax stuff
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        // search bar and text stuff
        this.searchField = $("#search-term");
        this.previousValue;

        this.isOverlayOpen = false;
        this.typingTimer;

        this.isSpinnerVisible = false;
        this.resultsDiv = $("#search-overlay__results");

        this.events();
    }
    //events
    events(){
        this.openButton.on("click", this.openOverlay.bind(this)); // .bind ensures that the function stays within this object's context, instead of making its own.
        this.closeButton.on("click", this.closeOverlay.bind(this));
        this.searchField.on("keyup", this.typingLogic.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
    }
    // typing logic
    typingLogic(){
        // alert('typing logic says hi :)'); // working
        // setTimeout(function () {
        //     console.log("timeout test")
        // }, 2000);

        if(this.searchField.val() != this.previousValue){ // check for changes in the text in the search bar
            clearTimeout(this.typingTimer); // reset any timer on this class var
            //check if the user deleted the script
            if(this.searchField.val()){ // search field is not empty
                if(!this.isSpinnerVisible){ // check for spinner
                    this.resultsDiv.html('<div class="spinner-loader"></div>'); // code to init the spinner
                    this.isSpinnerVisible = true; // checks for spinner
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 2000); // delay before searching
            }
            else{
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }
        }
        this.previousValue = this.searchField.val(); // grab new searchfield
    }
    getResults(){
        // send to wordpress server
        // populates the results section of the search feature
        // div is in footer.php
        // console.log("RESULTS");

        // jquery function,
        // param 1: a url to send a request to,
        // param 2: name of a functionto call after the url responds with the json data.
        // var param1 = settings.urlToPreview + '/wp-json/wp/v2/posts?search=' + this.searchField.val(); // old, local
        var param1 = universityData.root_url + '/wp-json/wp/v2/posts?search=' + this.searchField.val(); // old, local
        console.log("search.js -> getResults() says: API url -> " + param1);
        $.getJSON(
            param1,
            posts=>{ // ES6 arrow function syntax, an alternate way of using js syntax for binding context
                // using `` for template literals, and encasing js code in ${} padding
                // these template literals done support if statements in js,
                // using a ternary operator is a good workaround, eg:
                // ${posts.length ? '<ul class="link-list min-list">' : '<p>No general information matches that search.</p>'}
                var testArray = ['red', 'orange', 'yellow']; // test array to test map function
                // the map function works similar to a foreach. .join('') at the end to convert to string without commas
                this.resultsDiv.html(`
                    <h2 class="search-overlay__section-title">General Information</h2>
                    
                    ${posts.length ? '<ul class="link-list min-list">' : '<p>no matches were found :(</p>'}
                        ${posts.map(item => `
                            <li> 
                                <a href="${item.link}">${item.title.rendered}</a> by ${item.authorName}
                            </li>
                            `).join('')
                        }
                    ${posts.length ? '</ul>' : ''}
                `);
            }
        );

        this.isSpinnerVisible = false;
    }
    // open overlay
    openOverlay(){
        // open search overlay by adjusting and adding html elements dynamically
        this.searchOverlay.addClass("search-overlay--active"); // open the search overlay
        $("body").addClass("body-no-scroll"); // prevent scrolling while searching
        setTimeout(
            () => this.searchField.focus(), 301
        );
        this.isOverlayOpen = true; // checks
    }
    // close overlay
    closeOverlay(){
        // close search overlay by removing the adjusted html elements from openOverlay()
        this.searchOverlay.removeClass("search-overlay--active"); // remove class added from openOverlay()
        $("body").removeClass("body-no-scroll"); // restore scrolling ability when the search is closed3
        this.isOverlayOpen = false;
    }
    // key event methods
    keyPressDispatcher(e){
        // checks for keypresses and does things if certain keys are pressed

        // console.log("this is a test")
        if(e.keyCode == 83 && !this.isOverlayOpen) this.openOverlay(); // open the search overlay if 's' is pressed
        if(e.keyCode == 27 && this.isOverlayOpen) this.closeOverlay(); // close the search overlay if 'esc' is pressed
    }
}
export default Search; // export so we can instantiate this object outside.