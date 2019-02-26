import React from 'react';
import StyleFilter from './filters/StyleFilter';
import LevelFilter from './filters/LevelFilter';
import LocationFilter from './filters/LocationFilter';

import LessonList from './LessonList';
import { createFilter } from '../../util/Filter';
import { createSorter } from '../../util/Sort';
import { baseUrl, apiPath } from '../../util/config';

class Schedule extends React.Component {
  constructor(){
    super();
    this.state = {
      data: [],
      style: 'all',
      level: 'all',
      location: 'all',
      day: 'all',
    }
    this.handleStyleChange = this.handleStyleChange.bind(this);
    this.handleLevelChange = this.handleLevelChange.bind(this);
    this.handleLocationChange = this.handleLocationChange.bind(this);
  }

  componentDidMount () {
    let dataURL = baseUrl + apiPath;
    fetch(dataURL)
    .then(res => res.json())
    .then(res => {
      this.setState({
        data: this.parseData(res),
      });
    });
  }

  parseData (data) {
    let sorters = [
      {
        property: 'start_time',
      },
      {
        property: 'location',
      },
    ];

    if (data && data.length) {

      if (Array.isArray(sorters) && sorters.length) {
        data.sort(createSorter(...sorters));
      }
    }

    return data;
  }

  handleStyleChange(value){
    this.setState({
      style: value,
    })
  }

  handleLevelChange(value){
    this.setState({
      level: value,
    })
  }

  handleLocationChange(value){
    console.log(value);
    this.setState({
      location: value,
    })
  }

  render () {
    const { data } = this.state;
    const buenaVista = baseUrl == 'https://www.buena-vista.me/' ? true : false;
    return (
      <div id="react-schedule">
      <div className="row mb-3">
      <div className="col-12 col-sm-12 col-md-4 col-lg-4"><StyleFilter handleStyleChange={this.handleStyleChange } /></div>
      <div className="col-12 col-sm-12 col-md-4 col-lg-4"><LevelFilter handleLevelChange={this.handleLevelChange} /></div>
      <div className="col-12 col-sm-12 col-md-4 col-lg-4">
      { buenaVista ? '' : <LocationFilter handleLocationChange={this.handleLocationChange} />}
      </div>
      </div>
      <div className="schedule-box">
      { data ? this.renderData(data) : this.renderLoading() }
      </div>
      </div>
    )
  }

  renderData(data){
    if (data && data.length) {

      let filters = [
        {
          property: 'style',
          name: this.state.style,
        },
        {
          property: 'level',
          name: this.state.level,
        },
        {
          property: 'classroom',
          name: this.state.location,
        },
      ];

      console.log(this.state.location);
      console.log(filters);


      // let filteredData = data.filter( lesson => {
      //   if (this.state.style === 'all') {
      //     return true;
      //   }
      //   console.log(this.state.level);
      //   return lesson.style.includes(this.state.style)
      // })

      let filteredData = [];
      if (Array.isArray(filters) && filters.length) {
        filteredData = data.filter(createFilter(...filters));
      }

      // let lessons = filteredData.map((item, i) => {
      //   return  <Lesson key={i} course={item} />
      // });

      return <LessonList list={filteredData}/>
    } else {
      return <div className="jumbotron">
      <h4 className="text-center"><i className="fas fa-spinner fa-pulse"></i> Loading schedule...</h4>
      </div>
    }
  }

  renderLoading () {
    return <div>Loading schedule...</div>
  }
}

export default Schedule;
