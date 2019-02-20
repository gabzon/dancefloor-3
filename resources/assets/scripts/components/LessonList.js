import React from 'react';
import daysList from '../util/Days';
import { baseUrl, dayApi } from '../util/config';
import Lesson from './Lesson';

class LessonList extends React.Component {
  constructor(){
    super();
    this.state = {
      daysOfWeek: [],
    }
    this.dayLessons = this.dayLessons.bind(this);
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


  render(){

    let workingDays = this.state.daysOfWeek.map((day) => {
      return day.name.toLowerCase();
    })

    let orderDays = daysList.filter( day => {
      return workingDays.includes(day.name)
    })

    return <div className="list-box" style={{display:'flex', flexWrap: 'wrap'}}>
      {
        orderDays.map(day => {
          return <div key={day.position} className="day-box">
            { this.dayLessons(day.name) && this.dayLessons(day.name).length ? <h1 className="ttc">{day.name}</h1> : '' }
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


// let lessons = filteredData.map((item, i) => {
//   return  <Lesson key={i} course={item} />
// });
