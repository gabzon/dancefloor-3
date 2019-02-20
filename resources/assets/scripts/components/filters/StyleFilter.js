import React from 'react';
import { baseUrl, styleApi } from '../../util/config';
import { Select } from 'antd';

const Option = Select.Option;

class StyleFilter extends React.Component {

  constructor(){
    super();
    this.state = {
      listOfStyles: [],
    }
  }

  componentWillMount(){

    let dataURL = baseUrl + styleApi;

    fetch(dataURL)
    .then(res => res.json())
    .then(res => {
      this.setState({
        listOfStyles: res,
      })
    });
  }

  render(){
    let styles = this.state.listOfStyles.map((style, index) => {
      return <Option key={index} value={style.name}>{style.name}</Option>
    })
    return(
      <div>
        <Select placeholder="Select a style" style={{ width: '100%', marginBottom: '5px' }} onChange={this.props.handleStyleChange}>
          <Option value="all">All</Option>
          {styles}
        </Select>
      </div>
    )
  }
}

export default StyleFilter;
