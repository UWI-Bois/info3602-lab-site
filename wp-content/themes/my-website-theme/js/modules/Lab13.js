// 3rd party packages from NPM
import $ from 'jquery';

class Lab13{

    constructor() {
        console.log('Lab13 says hi :)');
        // class variables

        // html binds
        this.heightBtn = $(".height-btn"); // . -> class
        this.heightDiv = $("#height-div"); // # -> id

        this.billBtn = $(".bill-btn"); // . -> class
        this.billDiv = $("#bill-div"); // # -> id

        this.fruitBtn = $(".fruit-btn"); // . -> class
        this.fruitDiv = $("#fruit-div"); // # -> id

        this.todoBtn = $(".todo-btn"); // . -> class
        this.todoDiv = $("#todo-div"); // # -> id

        this.bookBtn = $(".book-btn"); // . -> class
        this.bookDiv = $("#book-div"); // # -> id

        // make sure it runs in the object
        this.events();
    }
    // bind buttons to their functions
    events(){
        this.heightBtn.on("click", this.heightTask.bind(this));
        this.billBtn.on("click", this.billTask.bind(this));
        this.fruitBtn.on("click", this.fruitTask.bind(this));
        this.todoBtn.on("click", this.todoTask.bind(this));
        this.bookBtn.on("click", this.bookTask.bind(this));
    }


    /*
    Methods to supply the buttons with functionality
     */

    // for height task in lab pdf
    heightTask(){
        /*
        using template literals to do task 1
         Output “Hello, I am 5 feet tall” where the 5 is stored in a variable called height.
         */
        var height = 5;
        console.log('Lab13 -> heightTask() says hi :)');
        this.heightDiv.html(`
            <p> Hello, I am ${height} feet tall </p>
        `);
    }

    // customer bill with james
    billTask(){
        /*
        Calculate and print the total cost of a bill for a customer:
        “James, you bill is now $500”
        where the 500 is produced using variables that
        store the total number of items and the unit
        price for each item. E.g. 10 items costing $50
        each and the customer’s name is inserted at the start of the output.
        Do the calculation inline within the template literal.

        to do this task, start by making a button and a div like above
         */
        var numItems = 10;
        var pricePerItem = 50;
        var tot_cost = numItems * pricePerItem;
        this.billDiv.html(`
            <p>Number of Items: ${numItems}</p>
            <p>Price per item: ${pricePerItem}</p>
            <p> James, your bill is now \$${tot_cost} </p>
        `);
    }

    fruitTask(){
        /*
        Create an array of 4 fruits,
        and print out a statement saying “I like ” followed by the 2nd item in the array
         */
        var fruits = ['Apple', 'Orange', 'Banana', 'Kiwi'];
        this.fruitDiv.html(`
            <p> I like ${fruits[1]}s </p>
        `);
    }

    // challenging Task 1 stuff
    todoTask(){
        /*
        Create an array of 5 things to do,
        and print out a statement saying “I have to: ”
        followed by the items in the array as unordered list <ul> of bulleted items <li>.
        Remove the commas at the end of each item output.

        this can be solved using teneray operators within the string literals

         */
        var tasks = [
            'Mow the lawn',
            'Clean my room',
            'Feed the dog',
            'Download the Konosuba movie'
        ];
        // tasks = [];
        this.todoDiv.html(`
            ${
            // teneray operator like an if statement
            tasks.length ?
                '<p> I have to: </p>' + // check plus sign
                '<ul class="link-list min-list"> ' // true
            :  // else
                '<p> no tasks found :( </p>'
            }
                ${ // this is separate from the inital teneray operator if statement thing.
                    tasks.map(item => `
                        <li>
                            ${item}
                        </li>
                    `).join('') // remove commas
                }
            ${
                tasks.length ? '</ul>' : ''
            }
        `);
    }
    bookTask(){
        /*
         Create an associative array of books and urls to the books,
         and print out a bulleted unordered list <ul>of the book titles as links <a>

        this can be solved using teneray operators within the string literals

         */
        var books = {
            'Google Book' : 'http://www.google.com',
            'YouTube Book' : 'http://www.youtube.com',
            'Facebook Book' : 'http://www.facebook.com'
        };
        var bookKeys = Object.keys(books);
        var bookVals = Object.values(books);
        this.bookDiv.html(`
            ${
            // teneray operator like an if statement
            bookKeys.length ?
                '<p> Booklist: </p>' + // check plus sign
                '<ul class="link-list min-list"> </ul>' // true
            :  // else
                '<p> no books found :( </p>'
            }
                ${ // this map will make iterate through all the keys
                    bookKeys.map(key => `
                        <li>
                            <a href="${books[key]}">${key}</a>
                        </li>
                    `).join('')
                }  
            ${
                bookKeys.length ? '</ul>' : ''
            }     
        `);
    }


}

export default Lab13;


