let GistAddForm = React.createClass({

    getInitialState: function () {
        return {username: ''}
    },

    onChange: function (e) {
        this.setState({username: e.target.value});
    },

    addGist: function (e) {
        e.preventDefault();
        this.props.onAdd(this.state.username);
        this.setState({username: ''});
    },

    render: function () {
        return (
            <form onSubmit={this.addGist}>
                <input type="text" value={this.state.username}
                       onChange={this.onChange} placeholder="type github username"/>
                <button>Get Gist</button>
            </form>
        );
    }

});


// export default GistAddForm;