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
        }
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
