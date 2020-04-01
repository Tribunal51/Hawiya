import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
} from 'react-router-dom';
import Home from '../../apps/Test/components/Home/Home';
import Page1 from '../../apps/Test/components/Page1/Page1';
import Page2 from '../../apps/Test/components/Page2/Page2';

class Test extends Component {
    state = {


    }

    render() {
        return (
            <div className="container">
                Test Components
                <Router>
                    <Link to="/dashboard/admin/test">Test</Link>
                    <Link to="/dashboard/admin/test/page1">Page 1</Link>
                    <Link to="/dashboard/admin/test/page2">Page 2</Link>
                    <Link to="/">Page 3</Link>
                    
                    <Switch>
                        <Route path="/page1">
                            <Page1 /> 
                        </Route>
                        <Route path="/page2">
                            <Page2 />
                        </Route>
                        <Route path="/">
                            <Home />
                        </Route>
                    </Switch>

                    
                </Router>
            </div>
        )
    }
}

export default Test;

ReactDOM.render(<Test />, document.getElementById('test'));