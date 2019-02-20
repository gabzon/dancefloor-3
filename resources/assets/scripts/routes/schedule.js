import React from 'react';
import ReactDOM from 'react-dom';
import StyleFilter from '../components/filters/StyleFilter';
import LevelFilter from '../components/filters/LevelFilter';
import LocationFilter from '../components/filters/LocationFilter';

import LessonList from '../components/LessonList';
import { createFilter } from '../util/Filter';
import { createSorter } from '../util/Sort';
import { baseUrl, apiPath } from '../util/config';


export default {
  init() {
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

        return (
          <div id="react-schedule">
            <div className="row mb-3">
              <div className="col-4"><StyleFilter handleStyleChange={this.handleStyleChange } /></div>
              <div className="col-4"><LevelFilter handleLevelChange={this.handleLevelChange} /></div>
              <div className="col-4">
                {baseUrl == 'https://www.buena-vista.me/' ? <LocationFilter handleLocationChange={this.handleLocationChange} /> : ''}
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
              property: 'location',
              name: this.state.location,
            },
          ];


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
          return <div class="jumbotron">
              <h4 class="text-center"><i class="fas fa-spinner fa-pulse"></i> Loading lessons...</h4>
            </div>
          }
        }

        renderLoading () {
          return <div>Loading...</div>
        }
      }

      ReactDOM.render(<Schedule />, document.getElementById('schedule'))
    },
  };
