const doFilter = (item, filter) => {
  //console.log(item[ filter.property ].includes(filter.name));
  return item[ filter.property ].includes(filter.name) || filter.name === 'all';

}

const createFilter = (...filters) => {
  if (typeof filters[0] === 'string') {

    filters = [
      {
        property: filters[0],
        value: filters[1],
      },
    ];
  }

  return item => filters.every(filter => doFilter(item, filter));
};

export { createFilter };
