"use strict";

let Stopwatch = React.createClass({

    getInitialState: function () {
        return {
            time: 0,
            until: 0,
            enabled: true
        };
    },

    start: function (e) {
        e.preventDefault();

        // React.findDOMNode(this.refs.button).disabled = true;
        this.setState({enabled: false});

        this.interval = setInterval(function () {
            this.tick();
            if (this.isTimeUp()) {
                this.finish();
            }
        }.bind(this), 1000);
    },

    type: function (e) {
        this.setState({until: e.target.value});
    },

    isTimeUp: function () {
        return this.state.time == this.state.until;
    },

    finish: function () {
        console.log('buzzzzzzzzz');

        //this.setState({time: 0, until: '', enabled: true});
        this.setState(this.getInitialState());

        React.findDOMNode(this.refs.input).focus();

        // React.findDOMNode(this.refs.button).disabled = false;

        return clearInterval(this.interval);
    },

    tick: function () {
        this.setState({time: this.state.time + 1});
    },

    render: function () {
        return (
            <form onSubmit={this.start}>
                <h1>stopwatch = {this.state.time}</h1>
                <p>{this.state.until ? 'will count up to: ' + this.state.until : ''}</p>
                <input ref="input" type="text"
                       onChange={this.type} value={this.state.until}/>

                <button disabled={!this.state.enabled}>go</button>
            </form>
        );
    }

});

React.render(<Stopwatch/>, document.querySelector('#stopwatch'));