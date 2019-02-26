import React from 'react';

class VideoItem extends React.Component {

  render(){
    const video = this.props.video;
    const onUserSelected = this.props.onUserSelected;
    const imageUrl = this.props.video.thumb;

    return(
      <li onClick={() => onUserSelected(video)} className="list-group-item list-group-item-action px-0" style={{cursor: 'pointer'}}>
        <a className="video-list media" href="#page-header">
          <img src={imageUrl} className="media-object img-fluid pr-2" alt={this.props.video.title} width="140" />
          <div className="media-body">
            <h5 className="mt-0">{this.props.video.title}</h5>
            <span className="black">
              {this.props.video.desc}
            </span>
          </div>
        </a>
      </li>
    )
  }
}

export default VideoItem;
