import React from 'react';

class Posts extends React.Component {
  render(){

    return(
      <div className="boxes">
        {this.props.posts.map((item,i) => {
          return (
            <div key={i} className="box tc bg-blue pa1 dib mv1 ml2" style={{backgroundColor: item.color, border: '1px solid black'}}>
              <div>{item.type}</div>
              <div>{item.color}</div>
              <div>{item.sex}</div>
            </div>
          )
        })}
      </div>
    )

  }
}

export default Posts;
