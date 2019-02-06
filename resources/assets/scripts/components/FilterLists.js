import React from 'react';

const options = {
  categories: [ 'type', 'color', 'sex'],
  postsPerPage: 9,
  activeClass: 'active',
};

class FilterLists extends React.Component{

  render(){

    let filtersSwitcher = this.props.filtersSwitcher,
    category = this.props.category;

    let listContent = this.props.filtersPack[category].map((item, i) => {
      return <li key={i}><a data-category={category} data-filter={item} onClick={filtersSwitcher} href="#">{item}</a></li>
    });

    let listButtons = this.props.filtersPack[category].map((item, i) => {
      return <button key={i} class="btn btn-secondary" type="button" data-category={category} data-filter={item} onClick={filtersSwitcher}>{item}</button>
    });

    return (
      <div className="tc pv5 ph1">
        <h3>{category}</h3>
        <div key={this.props.listKey} className="btn-group" role="group" aria-label="Basic example">
          <button type="button" className={options.activeClass + 'btn btn-secondary'} data-category={category} data-filter="all" onClick={filtersSwitcher}>All</button>
          {listButtons}
        </div>
        <ul key={this.props.listKey} className="filter-nav ma0 pa0 list">
          <li className={options.activeClass}><a data-category={category} data-filter="all" onClick={filtersSwitcher} href="#">all</a></li>
          {listContent}
        </ul>
      </div>
    )

  }
}

export default FilterLists;
