import $ from 'jquery';

class MyNotes{
    constructor(){
        console.log('MyNotes says hi :)');
        this.deleteBtn = $(".delete-note");
        this.events();
    }

    events(){
        this.deleteBtn.on("click", this.deleteNote.bind(this));
    }

    //Additional methods
    deleteNote(){
        console.log('delete note pushed!');
        $.ajax({
            url: universityData.r, 
            type: 'DELETE'
            // success: x,
            // error: x
        })
    }

}
export default MyNotes;