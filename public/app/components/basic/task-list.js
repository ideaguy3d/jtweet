"use strict";

let TaskList = React.createClass({

    render: function () {
        return (
            <ul>
                {this.props.items.map((task) => <li>{task}</li>)}
            </ul>
        );
    }

});