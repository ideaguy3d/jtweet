let Gist = React.createClass({

    render: function () {
        return (
            <div>
                {this.props.username}'s most recent gist =
                <a href={this.props.url} target="_blank"> {this.props.url}</a>
            </div>
        );
    }

});


// export default Gist;