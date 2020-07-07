// import GistAddForm from "./gist-add-form";
// import Gist from "./gist";

let GistBox = React.createClass({

    getInitialState: function () {
        return {
            gists: [
                {username: 'ideaguy3d', url: 'https://github.com/ideaguy3d'},
                {username: 'rlerdorf', url: 'https://github.com/rlerdorf'}
            ]
        };
    },

    addGist: function (username) {
        let url = `https://api.github.com/users/${username}/gists`;

        // using jQuery
        $.get(url, function (result) {
            const r = result[0];
            const username = r.owner.login;
            const url = r.html_url;
            let gists = this.state.gists.concat({username, url});
            this.setState({gists});
        }.bind(this));
    },

    render: function () {
        const newGist = function (gist) {
            return <Gist username={gist.username} url={gist.url}/>;
        }

        return (
            <div>
                <h1>GistBox</h1>

                <GistAddForm onAdd={this.addGist}/>

                {this.state.gists.map(newGist)}
            </div>
        );
    }

});

React.render(<GistBox/>, document.querySelector('#gist-app'));

// export default GistBox;