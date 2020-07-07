"use strict";

//
let GistBox = React.createClass({

    getInitialState: function () {
        return {
            gists: [
                {username: 'ideaguy3d', url: 'https://github.com/ideaguy3d'},
                {username: 'rlerdorf', url: 'https://github.com/rlerdorf'}
            ]
        };
    },

    render: function () {
        const newGist = function (gist) {
            return <Gist username={gist.username} url={gist.url}/>;
        }

        return (
            <div>
                <h1>GistBox</h1>

                <GistAddForm onAdd={this.addGist}></GistAddForm>

                {this.state.gists.map(newGist)}
            </div>
        );
    }

});

React.render(<GistBox/>, document.querySelector('#gist-app'));