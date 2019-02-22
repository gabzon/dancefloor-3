import React from 'react';

class Player extends React.Component {
  render(){
    const video = this.props.video;

    if (!video) {
      return (
        <div>
          Loading...
        </div>
      )
    }

    const videoId = video.id;
    const url = `https://www.youtube.com/embed/${videoId}`;
    //console.log(videoId);
    return(
      <div className="video-player" id="video-player">
        <br/>
        <div className="embed-responsive embed-responsive-16by9">
          <iframe className="embed-responsive-item" src={url} title="hola" allowFullScreen></iframe>
        </div>
        <div className="details mt-3">
          <h4>{video.title}</h4>
          <p>{video.desc}</p>
        </div>
      </div>
    )
  }
}

export default Player;
