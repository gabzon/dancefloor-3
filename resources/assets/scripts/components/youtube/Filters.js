import React from 'react';
import { Select } from 'antd';
import { url } from '../../util/config';

const Option = Select.Option;

class Filters extends React.Component {

  constructor(){
    super();
    this.state = {
      filters: [],
    }
  }

  componentDidMount () {

    //const finalURL = 'https://www.googleapis.com/youtube/v3/playlists?part=snippet&channelId=UCht8-pEFkJv40lNfMmKP0Qw&key=AIzaSyAOYG1Ai4mZy6L-ifZgQ8bzS87vA6v3JdA&maxResults=50';
    const finalURL = `${url.ytBaseUrl}/playlists?part=snippet&channelId=${url.bvChannelID}&key=AIzaSyAOYG1Ai4mZy6L-ifZgQ8bzS87vA6v3JdA&maxResults=${url.nbResults}`

    fetch(finalURL)
    .then(res => res.json())
    .then(res => {
      this.setState({
        filters: res.items,
      })
    });
  }

  render(){
    let playlist = this.state.filters.map((item, i) => {
      return <Option value={item.id} key={i}>{item.snippet.title}</Option>
    });

    return(
      <div className="mb-2" style={{ paddingTop: '20px'}}>
        <Select onChange={this.props.clicked} defaultValue="all" style={{ width: '100%' }}>
          <Option value="all">All</Option>
          {playlist}
        </Select>
      </div>
    )
  }
}

export default Filters;
