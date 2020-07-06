"use strict";

let TaskApp = React.createClass({

    getInitialState: function () {
        return {items: ['Study React', 'Study Laravel']}
    },

    render: function () {
        return (
            <div>
                <h1>Tasks for day</h1>
                <TaskList items={this.state.items}/>
            </div>
        );
    }

});

React.render(<TaskApp/>, document.getElementById('task-app'));