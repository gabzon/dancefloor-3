import React from 'react';
import ReactDOM from 'react-dom';
import { List, Card, Icon } from 'antd';
const { Meta } = Card;

// https://codepen.io/jchiatt/post/headless-wordpress-with-react-complete-tutorial
export default {
  init() {
    // JavaScript to be fired on the home page

    class Figure extends React.Component {
      constructor() {
        super();
        this.state = {
          movies: [],
        }
      }

      componentDidMount() {
        let dataURL = 'http://dancefloorgenevasalsa.ch/wp-json/wp/v2/figure?_embed&per_page=100';
        fetch(dataURL)
        .then(res => res.json())
        .then(res => {
          this.setState({
            movies: res,
          })
        })
      }

      render() {
        {/*
          let movies = this.state.movies.map((movie, index) => {
          return <div key={index}>
          <p><strong>Title:</strong> {movie.title.rendered}</p>
          </div>
        });
        */}

        return (
          <div>
          <List grid={{ gutter: 16, column: 4 }} dataSource={this.state.movies}
          renderItem={item => (
            <List.Item>
            <Card
              hoverable
              style={{ width: 240 }}
              cover={<img alt="dancehall" src={item.featured_img_url} />}
              actions={[<Icon type="setting" />, <Icon type="edit" />, <Icon type="ellipsis" />]}
            >
                <Meta title={item.title.rendered} description="www.instagram.com" />
              </Card>
            </List.Item>
          )}
          />
          </div>
        )
      }
    }

    ReactDOM.render(<Figure/>, document.getElementById('figure') );
    //http://localhost/dancefloor/web/wp-json/wp/v2/figure?_embed
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
