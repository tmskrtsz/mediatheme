const PATH = "wordpress/wp-content/themes/mediatheme";

const webpack = require("webpack");
const path = require("path");
const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = function(env) {
  return {
    entry: [`./${PATH}/js/main.js`, `./${PATH}/scss/main.scss`],
    output: {
      path: path.resolve(__dirname, `${PATH}/dist`),
      filename: "bundle.js"
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: path.resolve(__dirname, "node_modules"),
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['env']
            }
          }
        },
        {
          test: /\.css$/,
          exclude: path.resolve(__dirname, "node_modules"),
          use: ExtractTextPlugin.extract({
            use: "css-loader?importLoaders=1"
          })
        },
        {
          test: /\.(sass|scss)$/,
          exclude: path.resolve(__dirname, "node_modules"),
          use: ExtractTextPlugin.extract({
            use: [
              { 
                loader: "css-loader", 
                options: { 
                  sourceMap: true, 
                  minimize: false 
                } 
              },
              {
                loader: "postcss-loader",
                options: {
                  sourceMap: true,
                  plugins: [
                    require("postcss-flexbugs-fixes"),
                    require("autoprefixer")
                  ]
                }
              },
              { loader: "sass-loader", options: { sourceMap: true } }
            ]
          })
        },
        {
          test: /\.(jpg|png|gif|svg)$/,
          use: [
            {
              loader: 'file-loader',
              options: {
                name: 'images/[name].[ext]',
                publicPath: './'
              },
            },
            {
              loader: 'image-webpack-loader',
              options: {
                gifsicle: {
                  interlaced: false,
                },
                optipng: {
                  optimizationLevel: 7,
                },
                pngquant: {
                  quality: '65-90',
                  speed: 4
                },
                mozjpeg: {
                  progressive: true,
                  quality: 65
                },
              },
            }
          ]
        },
      ]
    },
    plugins: [
      new ExtractTextPlugin({
        filename: `[name].bundle.css`,
        allChunks: true
      })
    ]
  };
};
