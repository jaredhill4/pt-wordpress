'use strict';

const fs = require('fs');
const path = require('path');
const paths = require('./paths');

// Create application entry for each js file in 'resources/assets/js'
const makeEntries = () => {
  let entries = {};
  const files = fs
    .readdirSync(paths.appSrcJs)
    .filter(file => file.match(/.*\.js$/));
  files.forEach(
    file =>
      (entries[file.slice(0, -3)] = path.resolve(paths.appSrc, 'js', file))
  );
  return entries;
};

module.exports = makeEntries();
