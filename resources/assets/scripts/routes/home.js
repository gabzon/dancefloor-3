import React from 'react';
import ReactDOM from 'react-dom';
import Schedule from '../components/schedule/Schedule';

export default {
  init() {
    class Home extends React.Component{
      render(){
        return <div>
          <Schedule />
        </div>
      }
    }
    ReactDOM.render(<Home />, document.getElementById('schedule'))
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
