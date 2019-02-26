import React from 'react';
import daysList from '../../util/Days';
import { baseUrl, dayApi } from '../../util/config';
import Lesson from './Lesson';

class LessonList extends React.Component {
  constructor(){
    super();
    this.state = {
      daysOfWeek: [],
    }
    this.dayLessons = this.dayLessons.bind(this);
    this.displayDayName = this.displayDayName.bind(this);
  }

  componentWillMount(){
    let dataURL = baseUrl + dayApi;

    fetch(dataURL)
    .then(res => res.json())
    .then(res => {
      this.setState({
        daysOfWeek: res,
      })
    });
  }

  dayLessons(day){
    const upper = day.replace(/^\w/, c => c.toUpperCase());
    let lessons = this.props.list.filter(lesson => {
      return lesson.day.includes(upper)
    });
    return lessons;
  }

  displayDayName(day){
    const hostname = window.location.hostname;

    if (hostname === 'www.buena-vista.me'){
      return day.bhs
    }

    if (hostname === 'www.dancefloorgenevasalsa.ch'){
      return day.french
    }

    return day.name
  }


  render(){

    let workingDays = this.state.daysOfWeek.map((day) => {
      return day.name.toLowerCase();
    })

    let orderDays = daysList.filter( day => {
      return workingDays.includes(day.name)
    })

    return <div className="list-box" style={{display:'flex', flexWrap: 'wrap', justifyContent: 'space-between'}}>
      {
        orderDays.map(day => {
          return <div key={day.position} className="day-box">
            {this.dayLessons(day.name) && this.dayLessons(day.name).length ? <h4 className="ttc">{this.displayDayName(day)}</h4> : '' }
            {this.dayLessons(day.name).map((item, i)=>{
              if (item.type === 'class') {
                return  <Lesson key={i} course={item} />
              }
              return null;
            })}
          </div>
        })
      }
    </div>
  }
}

export default LessonList;
