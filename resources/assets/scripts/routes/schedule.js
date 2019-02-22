import React from 'react';
import ReactDOM from 'react-dom';
import Schedule from '../components/schedule/Schedule';

export default {
  init() {
      class ScheduleReact extends React.Component{
        render(){
          return <div>
            <Schedule />
          </div>
        }
      }
      ReactDOM.render(<ScheduleReact />, document.getElementById('schedule'))
    },
  };
