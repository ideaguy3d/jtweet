let Avatar = React.createClass({
    getDefaultProps: function () {
        return {
            path: 'http://bit.ly/1NABbkf'
        }
    },
    render: function () {
        return (
            <div>
                <a href={this.props.path} target="_blank"><img src={this.props.path}/></a>
            </div>
        );
    }
});


let HelloWorld = React.createClass({
    render: function () {
        return <h2><b> Hi World \^_^</b></h2>;
    }
});


React.render(<Avatar path="https://hackmatch.io/img/hack-match300.png"/>, document.getElementById('hm-avatar'));
React.render(<HelloWorld/>, document.getElementById('hello-world'));