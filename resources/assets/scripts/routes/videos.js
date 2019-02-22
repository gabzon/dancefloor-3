import React from 'react';
import ReactDOM from 'react-dom';
import Player from '../components/youtube/Player';
import Filters from '../components/youtube/Filters';
import Playlist from '../components/youtube/Playlist';
import { url } from '../util/config';

const chID = window.location.hostname === ' www.buena-vista.me' ? url.bvChannelID : url.dfChannelID;

export default {
  init() {
    class Videos extends React.Component{
      constructor(props){
        super(props);
        this.state = {
          videos: [],
          selectedVideo: null,
        }
        this.onChange = this.onChange.bind(this);
        this.coverVideo = this.coverVideo.bind(this);
      }

      componentDidMount () {
        const finalURL = `${url.ytBaseUrl}/search?key=${url.clientID}&channelId=${chID}&part=snippet,id&order=date&maxResults=${url.nbResults}`;
        console.log(finalURL);
        fetch(finalURL)
        .then(res => res.json())
        .then(res => {
          const videos = res.items.map(obj => {
            return {
              etag: obj.etag,
              id: obj.id.videoId,
              channelId: obj.id.channelId,
              playlistId: obj.id.playlistId,
              title: obj.snippet.title,
              thumb: obj.snippet.thumbnails.high.url,
              desc: obj.snippet.description,
            }
          });
          this.setState({
            videos,
            selectedVideo: this.coverVideo(videos),
          });
        });
      }

      coverVideo(videos){
        let list = videos.filter( item => {
          return typeof item.id !== 'undefined';
        });
        return list[0];
      }

      onChange(value) {
        if (value === 'all') {
          this.componentDidMount();
        }else{
          const finalURL = `${url.ytBaseUrl}/playlistItems?key=${url.clientID}&channelId=${chID}&part=snippet,id&&playlistId=${value}&order=date&maxResults=${url.nbResults}`;
          fetch(finalURL)
          .then(res => res.json())
          .then(res => {
            const videos = res.items.map(obj => {
              return {
                id: obj.snippet.resourceId.videoId,
                title: obj.snippet.title,
                thumb: obj.snippet.thumbnails.high.url,
                desc: obj.snippet.description,
                channelId: obj.snippet.channelId,
                etag: obj.etag,
                channelTitle: obj.snippet.channelTitle,
              }
            });
            this.setState({ videos, selectedVideo: this.coverVideo(videos) });
          });
        }
      }

      render(){
        let videoList = this.state.videos.filter( item => {
          return typeof item.id !== 'undefined';
        });

        return(
          <div className="App">
            <div className="container">
              <div className="row">
                <div className="col-12 col-sm-6 col-md-6 col-lg-6">
                  <Player video={this.state.selectedVideo}/>
                </div>
                <div className="col-12 col-sm-6 col-md-6 col-lg-6">
                  <Filters clicked={this.onChange}/>
                  <div style={{height: '550px', width:'100%'}} className="overflow-auto">
                    <Playlist list={videoList} onVideoSelect={userSelected => this.setState({selectedVideo: userSelected})}/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        )
      }
    }

    ReactDOM.render(<Videos />, document.getElementById('youtube-videos') );
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
