"use strict";

//
let GistAddForm = React.createClass({

    setInitialState: function () {
        return {
            text: ''
        }
    },

    onChange: function () {
        
    },

    render: function () {
        return (
            <form action="">
                <input type="text" value={this.state.text}
                       onChange={this.onChange} placeholder="type github username"/>
                <button>Get Gist</button>
            </form>
        );
    }

});