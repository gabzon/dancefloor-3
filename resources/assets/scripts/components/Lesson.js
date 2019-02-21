import React from 'react';

class Lesson extends React.Component {

  render(){

    const lessonStyle = {
      borderLeft: '5px solid',
      borderColor: this.props.course.color,
      margin: '0 15px 10px 0',
      minWidth: '250px',
      width: '100%',
      padding: '5px',
    }

    return(
      <a href={this.props.course.link} className="course black hover-dark-gray">
        <div className="course-link pl2 grow hover-bg-near-white" style={lessonStyle}>
          <span className="course-time">{this.props.course.start_time} - {this.props.course.end_time}</span>
          <br />
          <strong className="primary-color">{this.props.course.official_title}</strong>
          <br />
          <table>
            <tbody>
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
                <td>{this.props.course.location[0].name}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </a>
    )
  }
}

export default Lesson;
