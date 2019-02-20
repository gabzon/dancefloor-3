import React from 'react';
import { baseUrl, levelApi } from '../../util/config';
import { Select } from 'antd';

const Option = Select.Option;

class StyleFilter extends React.Component {

  constructor(){
    super();
    this.state = {
      listOfLevels: [],
    }
  }

  componentWillMount(){
    let dataURL = baseUrl + levelApi;

    fetch(dataURL)
    .then(res => res.json())
    .then(res => {
      this.setState({
        listOfLevels: res,
      })
    });
  }

  render(){
    let levels = this.state.listOfLevels.map((level, index) => {
      return <Option key={index} value={level.name}>{level.name}</Option>
    })
    return(
      <div>
        <Select placeholder="Select a level" style={{ width: 200 }} onChange={this.props.handleLevelChange}>
          <Option value="all">All</Option>
          {levels}
        </Select>
      </div>
    )
  }
}

export default StyleFilter;
