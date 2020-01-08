const path = require('path');
const webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');
const notifier = require('node-notifier');
const TerserPlugin = require('terser-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const safePostCssParser = require('postcss-safe-parser');

const paths = require('./paths');
const entries = require('./entries');

module.exports = env => {
  const isEnvProduction = env === 'production';
  const isEnvDevelopment = env === 'development';

  return {
    mode: env,
    bail: isEnvProduction,
    devtool: isEnvProduction ? 'source-map' : 'cheap-module-source-map',
    entry: entries,
    output: {
      path: paths.appBuild,
      filename: '[name].[contenthash:8].js',
      devtoolModuleFilenameTemplate: info =>
        path
          .relative(paths.appSrc, info.absoluteResourcePath)
          .replace(/\\/g, '/')
    },
    optimization: {
      minimize: isEnvProduction,
      minimizer: [
        new TerserPlugin({
          terserOptions: {
            parse: {
              ecma: 8
            },
            compress: {
              ecma: 5,
              warnings: false,
              comparisons: false,
              inline: 2
            },
            mangle: {
              safari10: true
            },
            output: {
              ecma: 5,
              comments: false,
              ascii_only: true
            }
          },
          parallel: true,
          cache: true,
          sourceMap: true
        }),
        new OptimizeCSSAssetsPlugin({
          cssProcessorOptions: {
            parser: safePostCssParser,
            map: {
              inline: false,
              annotation: true
            }
          }
        })
      ],
      splitChunks: {
        chunks: 'all',
        cacheGroups: {
          default: false,
          vendors: false,
          commons: {
            name: 'commons',
            chunks: 'initial',
            minChunks: 2
          }
        }
      }
    },
    // Adding jQuery as external library
    externals: {
      jquery: 'jQuery'
    },
    resolve: {
      modules: [paths.appNodeModules, paths.appSrc],
      extensions: ['.js', '.json']
    },
    module: {
      strictExportPresence: true,
      rules: [
        { parser: { requireEnsure: false } },
        {
          oneOf: [
            // Process images and embed if they are small enough.
            {
              test: [/\.bmp$/, /\.gif$/, /\.jpe?g$/, /\.png$/],
              loader: require.resolve('url-loader'),
              options: {
                limit: 10000,
                name: 'media/[name].[hash:8].[ext]'
              }
            },
            // Process JS with Babel.
            {
              test: /\.js$/,
              include: paths.appSrc,
              loader: require.resolve('babel-loader'),
              options: {
                presets: [
                  [
                    '@babel/preset-env',
                    {
                      useBuiltIns: 'usage',
                      corejs: 3
                    }
                  ],
                  '@babel/preset-react'
                ],
                cacheDirectory: true,
                cacheCompression: true,
                compact: true
              }
            },
            // Process SCSS.
            {
              test: /\.scss$/,
              use: [
                {
                  loader: MiniCssExtractPlugin.loader
                },
                {
                  loader: require.resolve('css-loader'),
                  options: {
                    importLoaders: 2,
                    sourceMap: isEnvProduction
                  }
                },
                {
                  loader: require.resolve('postcss-loader'),
                  options: {
                    ident: 'postcss',
                    plugins: () => [
                      require('postcss-flexbugs-fixes'),
                      require('postcss-preset-env')({
                        autoprefixer: {
                          flexbox: 'no-2009'
                        },
                        stage: 3
                      })
                    ],
                    sourceMap: isEnvProduction
                  }
                },
                {
                  loader: require.resolve('sass-loader'),
                  options: {
                    sassOptions: {
                      includePaths: [paths.appNodeModules, paths.appSrc]
                    },
                    sourceMap: isEnvProduction
                  }
                }
              ],
              sideEffects: true
            },
            // Process all files that aren't caught by other loaders.
            {
              exclude: [
                /\.js$/,
                /\.html$/,
                /\.json$/,
                /\.bmp$/,
                /\.gif$/,
                /\.jpe?g$/,
                /\.png$/
              ],
              loader: require.resolve('file-loader'),
              options: {
                name: 'media/[name].[hash:8].[ext]'
              }
            }
          ]
        }
      ]
    },
    plugins: [
      new CleanWebpackPlugin({
        verbose: false,
        // Prevent cleaning media files while in development mode
        cleanAfterEveryBuildPatterns: isEnvDevelopment ? ['!media/*'] : []
      }),
      new FriendlyErrorsWebpackPlugin({
        clearConsole: isEnvDevelopment,
        onErrors: (severity, errors) => {
          if (severity !== 'error') {
            return;
          }
          const error = errors[0];
          notifier.notify({
            title: 'Build error',
            message: `${severity}: ${error.name}`,
            subtitle: error.file || ''
          });
        }
      }),
      new webpack.DefinePlugin({
        'process.env.NODE_ENV': JSON.stringify(env)
      }),
      new MiniCssExtractPlugin({
        filename: '[name].[contenthash:8].css'
      }),
      new ManifestPlugin({
        fileName: 'manifest.json',
        publicPath: paths.appBuildRelative
      }),
      new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
    ],
    node: {
      module: 'empty',
      dgram: 'empty',
      dns: 'mock',
      fs: 'empty',
      http2: 'empty',
      net: 'empty',
      tls: 'empty',
      child_process: 'empty'
    },
    performance: false
  };
};
