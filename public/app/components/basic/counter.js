"use strict";

let Counter = React.createClass({
    getInitialState: function () {
        return {count: 0}
    },
    subtract: function () {
        let count = this.state.count - 1;
        this.setState({count});
    },
    add: function () {
        let count = this.state.count + 1;
        this.setState({count});
    },
    render: function () {
        return (
            <div>
                <h1>Counter: {this.state.count}</h1>

                <button onClick={this.subtract}> subtract 1</button>
                <button onClick={this.add}> add 1</button>
            </div>
        );
    }
});

React.render(<Counter/>, document.getElementById('counter'));