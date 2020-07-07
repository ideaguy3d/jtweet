"use strict";

let TaskApp = React.createClass({

    getInitialState: function () {
        return {
            items: ['Study React', 'Study Laravel'],
            task: ''
        };
    },

    onChange: function (eventObj) {
        let task = eventObj.target.value;
        // eventObj.target is the input element
        this.setState({task});
    },

    addTask: function (eventObj) {
        eventObj.preventDefault();
        
        //this.state.task += eventObj.target.value;
        this.setState({
            items: this.state.items.concat([this.state.task]),
            task: ''
        });
    },

    render: function () {
        return (
            <div>
                <h1>Tasks for day</h1>
                <TaskList items={this.state.items}/>

                <form onSubmit={this.addTask}>
                    <input type="text" onChange={this.onChange} value={this.state.task}/>
                    <button>add task</button>
                </form>
            </div>
        );
    }

});

React.render(<TaskApp/>, document.getElementById('task-app'));