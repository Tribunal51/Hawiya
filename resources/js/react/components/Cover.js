import React, { Component } from 'react'; 
import ReactDOM from 'react-dom';
import BlackBox from '../../components/UI/BlackBox';

class Cover extends Component {
    state = {

    }

    render() {
        return (
            <div className="container">
                Test component
                <BlackBox />
            </div>
        )
    }
}

export default Cover;
// ReactDOM.render(<Cover />, document.getElementById('react'));