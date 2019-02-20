import React from 'react';
import { Card } from 'antd';

class Lesson extends React.Component {
  render(){
    return(
      <a href={this.props.course.link} target="_blank">
        <Card hoverable size="small" className="grow" style={{ minWidth: 240, margin: '0 10px 10px 0'}} href="https://www.google.com/">
          <span>{this.props.course.start_time}-{this.props.course.end_time}</span>
          <h6>{this.props.course.official_title}</h6>
          <table>
            <tr>
              <td className="tc" width="20%"><i className="fas fa-signal"></i></td>
              <td>{this.props.course.level}</td>
            </tr>
            <tr>
              <td className="tc"><i className="fas fa-male"></i></td>
              <td>{this.props.course.teacher}</td>
            </tr>
            <tr>
              <td className="tc"><i className="fas fa-map-marker-alt"></i></td>
              <td>{this.props.course.location}</td>
            </tr>
          </table>
        </Card>
      </a>
    )
  }
}

export default Lesson;
