import React from 'react';
import ReactDOM from 'react-dom';
import Youtube from '../components/youtube/Youtube';

export default {
  init() {
    class Videos extends React.Component{
      render(){
        return <div>
          <Youtube />
        </div>
      }
    }

    ReactDOM.render(<Videos />, document.getElementById('youtube-videos') );
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
