// 3rd party packages from NPM
import $ from 'jquery';

class Lab13{

    constructor() {
        console.log('Lab13 says hi :)');
        // class variables
        this.height = 5;

        // html binds
        this.heightBtn = $(".height-btn"); // . -> class
        this.heightDiv = $("#height-div"); // # -> id

        // make sure it runs in the object
        this.events();
    }
    // bind buttons to their functions
    events(){
        this.heightBtn.on("click", this.heightTask.bind(this));
    }


    // give the buttons functionality
    heightTask(){
        /*
        using template literals to do task 1
         */
        console.log('Lab13 -> heightTask() says hi :)');
        this.heigthDiv.html(`
            <p> Hello, I am ${this.height} feet tall </p>g
        `)

    }

}

export default Lab13;


