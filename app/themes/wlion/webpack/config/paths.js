'use strict';

const path = require('path');
const fs = require('fs');

// Make sure any symlinks in the project folder are resolved:
// https://github.com/facebookincubator/create-react-app/issues/637
const appDirectory = fs.realpathSync(process.cwd());
const resolveApp = relativePath => path.resolve(appDirectory, relativePath);

module.exports = {
  appRoot: resolveApp('/'),
  appBuild: resolveApp('build'),
  appBuildRelative: path.join('/build/'),
  appSrc: resolveApp('assets'),
  appSrcJs: resolveApp('assets/js'),
  appSrcCss: resolveApp('assets/scss'),
  appPackageJson: resolveApp('package.json'),
  appNodeModules: resolveApp('node_modules'),
};
