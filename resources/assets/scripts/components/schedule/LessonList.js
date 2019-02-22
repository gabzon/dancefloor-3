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
      return <h1 className="ttc">{day.bhs}</h1>
    } else if (hostname === 'www.dancefloorgenevasalsa.ch'){
      return <h1 className="ttc">{day.french}</h1>
    }else{
      return <h1 className="ttc">{day.name}</h1>
    }
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
            {this.displayDayName(day.name)}
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
