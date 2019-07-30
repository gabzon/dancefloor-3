import React from 'react';
//import ProgramRestAPI from './rest-api/program-rest';

class Program extends React.Component {
  constructor(){
    super();
    this.state = {
      figures: [],
    }
  }

  componentDidMount () {
    fetch('https://www.dancefloorgenevasalsa.ch/wp-json/wp/v2/figure?per_page=100')
    .then(res => res.json())
    .then(data => this.setState({ figures: data }));
  }

  render(){
    console.log(this.state.figures);
    return (
      <div>
        <div className="row">
        {this.state.figures.map(figure =>
          <div className="col-12 col-sm-12 col-md-6 col-lg-3 mb-2" key={figure.id}>
            <a href={figure.link} target="_blank" className="f5 no-underline white bw0 bg-animate hover-white inline-flex items-center ba border-box shadow-1 grow shadow-hover">
            <article className="dt w-100 pointer">
              <div className="dtc w2 w3-ns v-mid">
              <img src={figure.featured_img_url} className="db w2 w3-ns h2 h3-ns ma0"/>
              </div>
              <div className="dtc v-mid pl3">
                <h6 className="f6 f5-ns fw4 lh-title mv0">{figure.title.rendered}</h6>
                <h6 className="f6 fw1 mt0 mb0 black-60">This is some text within a card.</h6>
              </div>
            </article>
            </a>
          </div>
        )}
        </div>
      </div>
    )
  }

}

export default Program;
