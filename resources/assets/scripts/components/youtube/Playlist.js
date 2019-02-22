import React from 'react';
import VideoItem from './VideoItem';


class Playlist extends React.Component {
  render(){
    const playlist = this.props.list.map(video => {
      return <VideoItem key={video.etag} video={video} onUserSelected={this.props.onVideoSelect}/>
    })

    return(
      <ul className="list-group list-group-flush">
        {playlist}
      </ul>
    )
  }
}


export default Playlist;
