// Tutorial https://www.robinwieruch.de/react-fetching-data/

import React from 'react';
import ReactDOM from 'react-dom';
import Program from '../components/program/program';
//import WPAPI from 'wpapi';

export default {
  init() {

    class ProgramApp extends React.Component {
      // constructor() {
      //   super();
      //   this.state = {
      //     posts: [],
      //   };
      // }

      componentDidMount(){
        //var wp = new WPAPI({ endpoint: '' });

        //var wp = new WPAPI({ endpoint: 'http://buena-vista.me/wp-json' });
        // wp.posts().then(function( posts ) {
        //   console.log( posts );
        // }).catch(function( err ) {
        //   console.error( err );
        // });

        //   wp.posts().perPage( 50 ).embed().get(function( err, data ) {
        //     if ( err ) {
        //       console.log(err);
        //     }
        //     return data;
        //   }).then( data => { this.setState({ posts: data })});
      }

      render() {
        //console.log(this.state.posts)
        return (
          <div>
            <Program />
          </div>
        )
      }
    }

    ReactDOM.render(<ProgramApp />, document.getElementById('figure') );
    //http://localhost/dancefloor/web/wp-json/wp/v2/figure?_embed
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
